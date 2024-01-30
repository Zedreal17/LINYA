<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentList;
use App\Models\FacultyInformation;

class updateAPprovalController extends Controller
{
    public function facultyApprovalView($id) {
    $appointment = AppointmentList::find($id);
    $facultyNames = FacultyInformation::all();

    return view('facultyApprovalView', [
        'appointment' => $appointment,
        'facultyNames' => $facultyNames,
    ]);
    }
}
