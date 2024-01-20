<?php

namespace App\Services;

use App\Models\Package;
use App\Services\BaseService;
use App\Http\Resources\PackageResource;
use App\Traits\MakeAsset;

class PackageService extends BaseService
{
    use MakeAsset;
    public function __construct(Package $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = PackageResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id'
        ];
        
        $this->serializingToJsonFields = [
            'ignores',
            'extra'
        ];

        parent::__construct();
    }

    public function getAll()
    {
        $this->setQuery();
        return $this->query->with(parseToRelation([
            'tests', 'translation', 'image'
        ]))->orderBy('priority', 'ASC')->get();    
    }

    public function getOne($id)
    {
        $this->setQuery();
        return $this->query
        ->with(parseToRelation([
            'tests', 'translation', 'image'
        ]))
        ->where('id', $id)
        ->orderBy('priority', 'ASC')
        ->first();    
    }

    public function getIds()
    {
        $this->setQuery();
        return $this->query->orderBy("id", "ASC")->get()->pluck("id")->toArray();
    }

    public function fullUpdate($data, $id)
    {
        $updates = popper($data, 'updates', []);
        $deletes = popper($data, 'deletes', []);
        $addes = popper($data, 'addes', []);
        $old = popper($data, 'medicines_old', []);
        $new = popper($data, 'medicines_new', []);
        $extra = popper($data, 'extra', []);
        return $this
            ->onSuccess(function ($package, $query) use ($updates, $deletes, $addes, $old, $new, $extra){
                $package->tests()->whereIn('id', $deletes)->delete();
                foreach ($updates as $utest) {
                    if (($id = getProp($utest, 'id')) && ($t = $package->tests()->find($id))) {
                        $t->update(['percent' => $utest['percent']]);
                    }
                }
                foreach ($addes as $atest) {
                    if ($testId = getProp($atest, 'id')) {
                        $package->tests()->create([
                            'test_id' => $testId,
                            'percent' => getProp($atest, 'percent', 0)
                        ]);
                    }
                }
                $package->medicines()->detach($old);
                $package->medicines()->attach($new);
            })
            ->edit($id, $data, true)
            ->redirect('admin.package.index');
    }
}
