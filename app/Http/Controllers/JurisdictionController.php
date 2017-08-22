<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use App\Http\Requests\Jurisdiction\SearchRequest;
use App\Http\Requests\Jurisdiction\StoreRequest;
use App\Models\Jurisdiction;
use Illuminate\Http\Request;

class JurisdictionController extends Controller
{
    public function index(SearchRequest $request)
    {
        $query = Jurisdiction::query();
        if ($request->sortName) {
            $query->orderBy($request->sortName, $request->sortOrder ?: 'asc'); // TODO: move default order value to config
        }
        $records = Jurisdiction::all();
        return response()->json($records);
    }

    public function store(StoreRequest $request)
    {
        $record = new Jurisdiction();
        $record->fill($request->all());
        $record->saveOrFail();
    }
}
