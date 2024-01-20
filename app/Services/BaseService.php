<?php

namespace App\Services;

use App\Traits\ResolveResponse;
use Closure;
use Error;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class BaseService
{
    use ResolveResponse;
    
     /**
     * Model instance
     * @var Model
     */
    public $model;

     /**
     * Model query builder instance
     * @var Builder
     */
    protected $query;

    public ?\Closure $queryClosure = null;
    
    /**
     * Model Resource class
     * @var JsonResource
     */
    protected $resource, $showResource;

    /**
     * Model Resources
     * @var JsonResource[]
     */
    protected $resources, $showResources;

    /**
     * Model Translation class
     * @var mixed
     */
    protected $translation;

    /**
     * Eager loading uchun actionda ko'rsatiladiga relationlar.
     * @var array
     */
    public array $relations = [];

    /**
     * Eager loading uchun actionda oddiy php array holatda ko'rsatiladigan va keyin ORM ga parse qilinadigan relationlar.
     * @var array
     */
    public array $willParseToRelation = [];

    /**
     * Umumiy conditiondan tashqari maxsus conditionlar. Actionda yoziladi.
     * @var array
     */
    public array $conditions = [];

    /**
     * Modeldagi like filter qilinadigan fieldlar ro'yxati. Translation tabledagi fieldlar bundab mustasno.
     * @var array
     */
    public array $likableFields = [];

    /**
     * Modeldagi like filter qilinadigan fieldlar ro'yxati. Translation tabledagi fieldlar bundab mustasno.
     * @var array
     */
    public array $relationLikableFields = [];

    /**
     * Databasega yozilishidan oldin JSON ga o'tkaziladigan fieldlar ro'yxati
     *
     * @var array
     */
    public array $serializingToJsonFields = [];

    /**
     * Modelning translation table idagi like filter qilinadigan fieldlar ro'yxati.
     *
     * @var array
     */
    public array $translationFields = [];

    /**
     * Modeldagi to'g'ridan to'gri equal filter qilinadigan fieldlar ro'yxati.
     *
     * @var array
     */
    public array $equalableFields = [];

    /**
     * Modeldagi numeric interval filter qilinadigan fieldlar ro'yxati.
     *
     * @var array
     */
    public array $numericIntervalFields = [];


    /**
     * Modeldagi date interval filter qilinadigan fieldlar ro'yxati.
     *
     * @var array
     */
    public array $dateIntervalFields = [];

    /**
     * Model uchun default order. Agar requestda sort param berilmasa, shu attribute bo'yicha sort qilinadi.
     *
     * @var array
     */
    public array $defaultOrder = [['column' => 'id', 'direction' => 'asc']];

    /**
     * O'chirish, yangilash va bitta ma'lumotni o'qish qaysi field orqali amalga oshirilishi(main operation column)
     * @var string
     */
    protected $id = 'id';

      /**
     * Table name of the model
     * @var string
     */
    public string $table;
    
    /**
     * Qaysi methodlar aftorizatsiya qilinishi kerakligini aytish
     * @var array
     */
    public array $authorizeMethods = [];

    /**
     * Authorization 
     * @var array
     */
    public bool $needAuthorization = true;

     /**
     * Muvafaqiyatli ravishda yangilangan yoki yaratilgan yoki o'chirilgan model
     * @var array
     */
    protected ?Closure $resultClosure = null;

    protected bool $clear = false;

    public function clearAfter($clear = true)
    {
        $this->clear = $clear;
        return $this;
    }

    protected function authorizeMethod($method, $model = null)
    {
        if ($this->needAuthorization) {
            if (is_null($model) && in_array($method, $this->authorizeMethods)) {
                Gate::authorize($method, $this->model);
            } elseif (in_array($method, $this->authorizeMethods)) {
                Gate::authorize($method, $model);
            }
        }
        $this->needAuthorization = true;
    }

    public function setTableName()
    {
        if ($this->model) {
            if (!is_null($this->model->table)) {
                $this->table = $this->model->table;
            } else {
                $namespaceToArray = explode("\\", get_class($this->model));
                $nameOfTheModel = end($namespaceToArray);
                $this->table = Str::snake(Str::plural($nameOfTheModel));
            };
        } else $this->table = '';
        return $this->table;
    }


    public function __construct()
    {
        if (isset($this->{'defaultAuthorizeMethods'})) {
            $this->authorizeMethods = array_merge($this->authorizeMethods, $this->{'defaultAuthorizeMethods'});
        }
        $this->translation = $this->model->translationClass ?? null;

        if (!empty($this->translation)) {
            // $this->relations += ['translations', 'translation'];
        }
        $this->setTableName();
    }

    protected function withResource($data, $isCollection = false)
    {
        if ($this->resource) {
            if ($isCollection) {
                return $this->resource::collection($data);
            } else {
                return $this->showResource ? $this->showResource::make($data) : $this->resource::make($data);
            }
        } else {
            return $data;
        }
    }

    public function except($model, $key = 'id')
    {
        if(is_object($model)) {
            if (isset($model->{$key})) {
                $this->conditions[] = ['id', '<>', $model->{$key}];
            }
        } else {
            $this->conditions[] = ['id', '<>', $model];
        }
        return $this;
    }

    private function completed() 
    {
        if ($this->clear) {
            $this->relations = [];
            $this->willParseToRelation = [];
            $this->conditions = [];
            $this->queryClosure = null;
            $this->resultClosure = null;
            $this->query = null;
        }
    }

    public function getList($data = [])
    {
        $this->authorizeMethod(__FUNCTION__);
        $needPagination = $data['pagination'] ?? $data['p'] ?? 0;
        $page = $data['page'] ?? 1;
        $rows = $data['rows'] ?? 100;
        $this->setQuery();
        $this->query->with(parseToRelation($this->willParseToRelation));
        $this->query->with($this->relations);
        $this->query->where($this->prepareConditions());
        $this->callQueryClosure();
        $this->languageFilter();
        $this->filter();
        $this->specialFilter();
        $this->sort();
        $this->specialSort();
        $data = $needPagination ? $this->query->paginate($rows, ['*'], $page) : $this->query->get();
        $this->completed();
        return $data;
    }

    public function withRelation($relations = [])
    {
        $this->willParseToRelation = $relations;
        return $this;
    }

    public function with($relations = [])
    {
        $this->willParseToRelation = $relations;
        return $this;
    }

    /**
     * Set result
     */
    protected function setResult($result)
    {
        // dd($result, "Result", $this->resultClosure);
        if ($this->resultClosure && $this->resultClosure instanceof Closure) {
            call_user_func($this->resultClosure, $result, $this->query);
        }
    }

    public function onSuccess(Closure $callback)
    {
        $this->resultClosure = $callback;
        return $this;
    }

    public function random($with = [])
    {
        $this->setQuery();
        return $this->query->with(parseToRelation($with))->inRandomOrder()->first();
    }

    public function getListWithResponse($data, $withResource = true)
    {
        if ($withResource) return $this->makeResponse(1, $this->withResource($this->getList($data), true));
        return $this->makeResponse(1, $this->getList($data));
    }

    protected function callQueryClosure()
    {
        try {
            if ($this->queryClosure) call_user_func($this->queryClosure, $this->query);
        } catch (\Throwable $th) {
            if ($this->checkInitialized('queryClosure')) call_user_func($this->queryClosure, $this->query);
        }
    }

    protected function prepareConditions()
    {
        if (!empty($this->table)) {
            return array_map(function ($condition) {
                if (!empty($condition)) {
                    $column = $condition[0];
                    if (!str_contains($column, $this->table)) {
                        $condition[0] = "$this->table.$column";
                    }
                }
                return $condition;
            }, $this->conditions);
        } else return $this->conditions;
    }

    protected function checkInitialized($property, $class = null, $object = null)
    {
        return (new \ReflectionProperty($class ?? static::class, $property))->isInitialized($object ?? $this);
    }

    public function create($data, $redirective = false)
    {
        try {
            return $this->makeResponse(1, $this->createWithThrow($data), null, 201,$redirective);
        } catch (\Throwable $th) {
            return $this->makeResponse(0, null, $th->getMessage(), 500, $redirective);
        }
    }

    public function createWithThrow($data)
    {
        $data = $this->checkColumn($data, 'created_by');
        DB::connection($this->model->connection)->beginTransaction();
        $this->authorizeMethod(__FUNCTION__);
        try {
            if (isset($data['translations'])) {
                $translations = $data['translations'];
                unset($data['translations']);
            }
            foreach ($this->serializingToJsonFields as $field) {
                if (isset($data[$field]) && is_array($data[$field])) {
                    $data[$field] = json_encode($data[$field]);
                }
            }
            $model = $this->model->create($data);
            if ($this->translation) {
                foreach ($translations as $translation) {
                    $this->translation::create($translation + ['object_id' => $model->id]);
                }
            }
            DB::connection($this->model->connection)->commit();
            $model->refresh();
            $this->setResult($model);
            // $this->completed();
            return $model;
        } catch (\Throwable $throwable) {
            DB::connection($this->model->connection)->rollBack();
            Log::error($throwable->getMessage() . " " . static::class . '::' . __FUNCTION__ . ' ' . $throwable->getLine() ?? __LINE__ . ' line');
            throw new Error('not_implemented. ' . $throwable->getMessage(), 501);
        }
    }

    // public function createWithResponse($data)
    // {
    //     try {
    //         return $this->makeResponse(1, $this->createWithThrow($data), null, 201);
    //     } catch (\Throwable $th) {
    //         return $this->makeResponse(0, null, $th->getMessage(), 500);
    //     }
    // }

    public function getModelName()
    {
        $arr = explode('\\', get_class($this->model));
        if ($this->checkInitialized('model')) return Str::lower(Str::snake(end($arr)));
    } 

    public function find($values)
    {
        if ($this->query === null) {
            $this->query = $this->model->query();
        }
        if (is_array($values)) {
            foreach ($values as $column => $value) {
                $this->query = $this->query->where($column, $value);
            }
            $data = $this->query->first(); 
            // $this->completed();
            return $data;
        }
    }
    /**
     * @return Model|Builder|null
     */
    public function findById($id, $query = null)
    {
        if(!$query) $this->setQuery();
        if ($this->model->hasUuid) $this->id = 'uuid';
        try {
            $data = $this->query->where($this->id, '=', $id)->first();
            // $this->completed();
            return $data;
        } catch (QueryException $e) {
            throw new \Error("Please give main operation column name " . static::class . '::$id constructor. Default column is id or check ' . $e->getMessage());
        }
    }

    public function edit($id, $data, $redirective = false)
    {
        try {
            return $this->makeResponse(1, $this->editWithThrow($id, $data), null, 200, $redirective);
        } catch (\Throwable $th) {
            return $this->makeResponse(0, null, $th->getMessage(), 500, $redirective);
        }
    }

    public function editWithThrow($id, $data)
    {
        $this->setQuery();
        $model = $this->findById($id);
        if ($model) {
            $this->authorizeMethod(__FUNCTION__, $model);
            try {
                $translations = [];
                if (isset($data['translations'])) {
                    $translations = $data['translations'];
                    unset($data['translations']);
                }
                // $data['updated_by'] = auth()->id();
                foreach ($this->serializingToJsonFields as $field) {
                    if (isset($data[$field]) && is_array($data[$field])) {
                        $data[$field] = json_encode($data[$field]);
                    }
                }
                $model->update($data);
                if ($this->translation) {
                    foreach ($translations as $translation) {
                        if (isset($translation['id']) && !empty($translation['id'])) {
                            $trModel = $this->translation::find($translation['id']);
                            if ($trModel) {
                                $trModel->update($translation);
                            }
                        } else {
                            unset($translation['id']);
                            $isExists = $this->translation::firstWhere([
                                'object_id' => $model->id,
                                'language_code' => $translation['language_code'],
                            ]);
                            if (!$isExists) {
                                $this->translation::create($translation + ['object_id' => $model->id]);
                            }
                        }
                    }
                }
                DB::connection($this->model->connection)->commit();
                $model->refresh();
                $this->setResult($model);
                // $this->completed();
                return $this->withResource($model);
            } catch (\Throwable $throwable) {
                DB::connection($this->model->connection)->rollBack();
                Log::error($throwable->getMessage() . " " . static::class . '::' . __FUNCTION__ . ' ' . $throwable->getLine() ?? __LINE__ . ' line');
                throw new Error($throwable->getMessage(), 501);
            }
        } else {
            $message = 'not_found';
            $arr = explode('\\', get_class($this->model));
            $message = Str::lower(Str::snake(end($arr))) . "_$message";
            throw new Error($message, 404);
        }
    }

    // public function editWithResponse($id, $data)
    // {
    //     try {
    //         return $this->makeResponse(1, $this->editWithThrow($id, $data));
    //     } catch (\Throwable $th) {
    //         return $this->makeResponse(0, null, $th->getMessage(), 500);
    //     }
    // }

    public function showWithThrow($id)
    {
        $this->setQuery();
        $this->query->with($this->relations + parseToRelation($this->willParseToRelation));
        $this->callQueryClosure();
        $model = $this->findById($id, $this->query);
        if ($model) {
            $this->authorizeMethod(__FUNCTION__, $model);
            $this->setResult($model);
            // $this->completed();
            return $model;
        } else {
            $message = 'not_found';
            $arr = explode('\\', get_class($this->model));
            $message = Str::lower(Str::snake(end($arr))) . "_$message";
            throw new Error($message, 404);
        }
    }

    public function show($id)
    {
        try {
            return $this->showWithThrow($id);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function showWithResponse($id, $withResource = true)
    {
        try {
            if($withResource) return $this->makeResponse(1, $this->withResource($this->show($id)));
            else return $this->makeResponse(1, $this->show($id));
        } catch (\Throwable $th) {
            return $this->makeResponse(0, null, $th->getMessage(), 500);  
        }
    }

    public function deleteWithThrow($id)
    {
        $this->setQuery();
        $model = $this->findById($id);
        if ($model) {
            $this->callQueryClosure();
            $this->authorizeMethod(__FUNCTION__, $model);
            if ($this->translation) $model->translations()->delete();
            $this->setResult($model);
            $model->delete();
            // $this->completed();
        } else {
            $message = 'not_found';
            $arr = explode('\\', get_class($this->model));
            $message = Str::lower(Str::snake(end($arr))) . "_$message";
            throw new Error($message, 404);
        }
    }

    public function delete($id, $redirective = false)
    {
        try {
            return $this->makeResponse(1, $this->deleteWithThrow($id), null, 204, $redirective);
        } catch (\Throwable $th) {
            return $this->makeResponse(0, null, $th->getMessage(), 500, $redirective);
        }
    }

    // public function deleteWithResponse($id)
    // {
    //     try {
    //         return $this->makeResponse(1, $this->deleteWithThrow($id), null, 204);
    //     } catch (\Throwable $th) {
    //         return $this->makeResponse(0, null, $th->getMessage(), 500);
    //     }
    // }

    protected function setQuery()
    {
        $this->query = $this->model->query();
    }

    private function checkColumn($data, $column)
    {
        $isColExist = Schema::connection($this->model->connection)->hasColumn($this->model->getTable(), $column);
        if ($isColExist)
            $data[$column] = auth()->id() ?? 1;

        return $data;
    }

    public function languageFilter()
    {
        if (!empty($this->translation)) {
            $this->query->whereHas('translation', function ($query) {
                $query->where('language_code', config('app.locale'));
            });
        }
    }

    public function filter()
    {
        // global search
        if ($s = request('s') !== null) {
            $this->query->where(function ($query) use ($s) {

                // model likable fields
                foreach ($this->likableFields as $field) {
                    $query->orWhere($field, 'ilike', '%' . request('s') . '%');
                }
                // translation likable fields
                if (!empty($this->translation)) {
                    foreach ($this->translationFields as $field) {
                        $query->orWhereHas('translation', function ($query) use ($field) {
                            $query->where($field, 'ilike', '%' . request('s') . '%');
                        });
                    }
                }
                // relation likable fields
                $query = $this->relationLikableFilter($s, $this->relationLikableFields, $query);
            });
        }
        // model likable filters
        $this->query->where(function ($query) {
            foreach ($this->likableFields as $field) {
                if (request($field) !== null) {
                    $query->where($field, 'ilike', '%' . request($field) . '%');
                }
            }
        });
        // translation likable filters
        $this->query->where(function ($query) {
            if (!empty($this->translation)) {
                foreach ($this->translationFields as $field) {
                    if (request($field) !== null) {
                        $query->whereHas('translation', function ($query) use ($field) {
                            $query->where($field, 'ilike', '%' . request($field) . '%');
                        });
                    }
                }
            }
        });
        // exact equal filters
        foreach ($this->equalableFields as $field) {
            if (request($field) !== null && request($field) != 'null') {
                $this->query->whereIn($field, explode(',', request($field)));
            }
        }
        // numeric interval filters
        foreach ($this->numericIntervalFields as $field) {
            if (request($field) !== null && str_contains(request($field), '|')) {
                list($from, $to) = explode('|', request($field));
                $this->query->where(function ($query) use ($field, $from, $to) {
                    if ($from) $query->where($field, '>=', $from);
                    if ($to) $query->where($field, '<=', $to);
                });
            }
        }
        // date interval filters
        foreach ($this->dateIntervalFields as $field) {
            if (request($field) && str_contains(request($field), '|')) {
                list($from, $to) = explode('|', request($field));
                $this->query->where(function ($query) use ($field, $from, $to) {
                    if ($from) $query->whereDate($field, '>=', $from);
                    if ($to) $query->whereDate($field, '<=', $to);
                });
            }
        }
    }

    /**
     * Service uchun maxsus filter qo'shish funksiyasi. Service ni o'zida ushbu funksiya overwrite qilinadi.
     *
     * @param null
     * @return Query $query
     */
    public function specialFilter()
    {
    }

    /**
     * Service uchun maxsus filter sort funksiyasi. Service ni o'zida ushbu funksiya overwrite qilinadi.
     * @param null
     * @return Query $query
     */
    protected function specialSort()
    {
    }

    public function exists($id)
    {
        try {
            $this->setQuery();
            return $this->query->where($this->id, '=', $id)->exists();
        } catch (QueryException $e) {
            throw new Error("Please give main operation column name " . static::class . '::$id constructor. Default column is id');
        }
    }

    public function existsByColumn($column, $value)
    {
        try {
            $this->setQuery();
            return $this->query->where($column, '=', $value)->exists();
        } catch (QueryException $e) {
            throw new Error($e->getMessage(), 501);
        }
    }

    /**
     * Service uchun relation columnlariga filter qo'shish funksiyasi. Service ni o'zida ushbu funksiya overwrite qilinadi.
     * @return Query $query
     */
    public function relationLikableFilter($search, $likableRelations, $query)
    {
        foreach ($likableRelations as $relation => $field) {
            if (is_array($field)) {
                foreach ($field as $key => $value) {
                    if (is_string($key)) {
                        $this->relationLikableFilter($search, [$key => $value], $query);
                    } else {
                        $query->orWhereHas($relation, function ($q) use ($value, $search) {
                            $q->where($value, 'ilike', '%' . $search . '%');
                        });
                    }
                }
            } else if (is_string($field)) {
                $query->orWhereHas($relation, function ($q) use ($field, $search) {
                    $q->where($field, 'ilike', '%' . $search . '%');
                });
            }
        }
    }

    public function order($field, $direction)
    {
        if($this->query) {
            $this->query->orderBy("$this->table.$field", $direction);
        }
        return $this;
    }

    protected function sort()
    {
        if ($sort = request('sort')) {
            foreach (explode(',', $sort) as $s) {
                $desc = str_starts_with($s, '-');
                $type = $desc ? 'DESC' : 'ASC';
                $field = $desc ? substr($s, 1) : $s;
                if ($this->columnExists($field)) {
                    $this->query->orderBy("$this->table.$field", $type);
                }
            }
        } elseif (!empty($this->defaultOrder)) {
            foreach ($this->defaultOrder as $order) {
                $this->query->orderBy($this->table . '.' . $order['column'], $order['direction']);
            }
        }
    }

    private function columnExists($column)
    {
        return Schema::connection($this->model->connection)->hasColumn($this->model->getTable(), $column);
    }

    public function changeResource($index)
    {
        if (is_string($index)) {
            $this->resource = $index;
            return $this;
        }
        if (isset($this->resources[$index])) {
            $this->resource = $this->resources[$index];
        }
        return $this;
    }

    public function changeShowResource($index)
    {
        if (is_string($index)) {
            $this->showResource = $index;
            return $this;
        }
        if (isset($this->showResources[$index])) {
            $this->showResource = $this->showResources[$index];
        }
        return $this;
    }

    public function withTransaction(\Closure $executer = null, \Closure $catch = null, \Closure $then = null)
    {
        $data = null;
        try {
            DB::beginTransaction();
            if ($executer && $executer instanceof \Closure) {
                $data = $executer();
            }
            DB::commit();
            if ($then && $then instanceof \Closure) {
                $then($data);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            $code = 500;
            if(!is_numeric($code)) $code = 500;
            if($code > 505 || $code < 100) $code = 500;
            if ($catch && $catch instanceof \Closure) {
                $catch($th->getMessage() . ' in '. $th->getFile() . ' '  . $th->getLine() . '-line', $code);
            }
        }
    }
}