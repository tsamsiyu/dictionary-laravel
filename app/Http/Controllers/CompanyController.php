<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use App\Http\Requests\Company\StoreRequest;
use App\Models\Company;

class CompanyController extends Controller
{
/*    public function store(StoreRequest $request)
    {
        $data = $this->snakelize($request->all());
        dd($data);
        $model = new Company();
        $model->fill($data);
        $model->saveOrFail();
    }

    private function snakelize(iterable $data)
    {
        return array_reduce($data, function ($result, $item, $key) {
            $result[$key] = $item;
            return $result;
        }, []);

    }*/
}