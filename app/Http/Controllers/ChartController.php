<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function appointmentReasonsChart()
    {
        $data = DB::table('linyatbl')
            ->select('appointment_reasons', DB::raw('count(*) as count'))
            ->groupBy('appointment_reasons')
            ->get();

        return view('appointment-reasons-chart', compact('data'));
    }
}
