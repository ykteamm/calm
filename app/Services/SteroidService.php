<?php

namespace App\Services;

use App\Models\Steroid;
use App\Services\BaseService;
use App\Http\Resources\SteroidResource;

class SteroidService extends BaseService
{
    public function __construct(Steroid $serviceModel)
    {
        $this->model = $serviceModel;
        $this->resource = SteroidResource::class;

        $this->likableFields = [
        ];

        $this->equalableFields = [
            'id',
        ];

        parent::__construct();
    }

    public function fullUpdate($data, $id)
    {
        $updates = popper($data, 'updates', []);
        $deletes = popper($data, 'deletes', []);
        $addes = popper($data, 'addes', []);
        return $this
            ->onSuccess(function ($steroid, $query) use ($updates, $deletes, $addes){
                $steroid->tests()->whereIn('id', $deletes)->delete();
                foreach ($updates as $utest) {
                    if (($id = getProp($utest, 'id')) && ($t = $steroid->tests()->find($id))) {
                        $t->update(['percent' => $utest['percent']]);
                    }
                }
                foreach ($addes as $atest) {
                    if ($testId = getProp($atest, 'id')) {
                        $steroid->tests()->create([
                            'test_id' => $testId,
                            'percent' => getProp($atest, 'percent', 0)
                        ]);
                    }
                }
            })
            ->edit($id, $data, true)
            ->redirect('admin.steroid.index');
    }
}
