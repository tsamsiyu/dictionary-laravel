<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use App\Models\Jurisdiction;

class JurisdictionController extends Controller
{
    public function index()
    {
        $records = Jurisdiction::all();
        return response()->json($records);
    }
}