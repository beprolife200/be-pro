<?php

namespace App\Http\Controllers;

use BePro\Series\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
        return response()->json(['data' => $series]);
    }
}
