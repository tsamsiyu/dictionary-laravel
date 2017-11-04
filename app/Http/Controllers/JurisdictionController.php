<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use App\Http\Requests\Jurisdiction\SearchRequest;
use App\Http\Requests\Jurisdiction\StoreRequest;
use App\Models\Jurisdiction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class JurisdictionController extends Controller
{
    /*public function index(SearchRequest $request)
    {
        $query = Jurisdiction::query();
        if ($request->sortName) {
            $query->orderBy($request->sortName, $request->sortOrder ?: 'asc'); // TODO: move default order value to config
        }
        if ($request->id) {
            $query->where('id', '=', $request->id);
        }
        if ($request->name) {
            $query->where(DB::raw('lower(name)'), 'LIKE', '%' . strtolower($request->name) . '%');
        }
        $amount = $query->count();
        $query->limit(5);
        $records = $query->get();

        return response()->json([
            'amount' => $amount,
            'records' => $records
        ]);
    }

    public function item(Jurisdiction $jurisdiction)
    {
        return response()->json($jurisdiction);
    }

    public function store(StoreRequest $request)
    {
        $record = new Jurisdiction();
        $record->fill($request->all());
        $record->saveOrFail();
        return response()->json($record);
    }

    public function destroy(Jurisdiction $jurisdiction)
    {
        $jurisdiction->delete();
        return response('Deleted', 204);
    }*/
}
