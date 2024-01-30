<?php

namespace App\Http\Controllers;

use App\Models\StudentInformation;
use Illuminate\Http\Request;
use App\Models\AppointmentList;

class StudentController extends Controller
{
    public function index()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Computer Studies Department')
            ->whereDate('date_appointment', '>=', now())
            ->get();

        return view('studentdata/computer-studies');
    }

    // Repeat for other methods like computerStudiesSchedule, electricalEngineeringSchedule, etc.


    public function computerStudiesSchedule()
    {
        $data = StudentInformation::where('sStatus', 'ACTIVE')
            ->where('cdepartment', 'Computer Studies Department')
            ->get();
        return view('studentdata', ['data' => $data, 'department' => 'Computer Studies Department']);
    }

    public function electricalEngineeringSchedule()
    {
        $data = StudentInformation::where('sStatus', 'ACTIVE')
            ->where('cdepartment', 'Electrical, Electronics, and Computer Engineering (EECE) Department')
            ->get();

        return view('studentdata', ['data' => $data, 'department' => 'EECE Engineering Department']);
    }

    public function CivilEngineeringSchedule()
    {
        $data = StudentInformation::where('sStatus', 'ACTIVE')
        ->where('cdepartment', 'Civil Engineering Department')
        ->get();

        return view('studentdata', ['data' => $data, 'department' => 'Civil Engineering Department']);
    }

    public function ArchitecturalEngineeringSchedule()
    {
        $data = StudentInformation::where('sStatus', 'ACTIVE')
            ->where('cdepartment', 'Architecture Department')
            ->get();

        return view('studentdata', ['data' => $data, 'department' => 'Architecture Department']);
    }
}
