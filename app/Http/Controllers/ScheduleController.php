<?php

namespace App\Http\Controllers;

use App\Models\AppointmentList;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Computer Studies Department')
            ->whereDate('date_appointment', '>=', now())
            ->get();

        return view('schedule', ['data' => $data, 'department' => 'Computer Studies Department']);
    }
    public function computerStudiesSchedule()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Computer Studies Department')
            ->whereDate('date_appointment', '>=', now())
            ->get();

        return view('schedule', ['data' => $data, 'department' => 'Computer Studies Department']);
    }

    public function electricalEngineeringSchedule()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Electrical, Electronics, and Computer Engineering (EECE) Department')
            ->whereDate('date_appointment', '>=', now())
            ->get();

        return view('schedule', ['data' => $data, 'department' => 'EECE Engineering Department']);
    }
    public function CivilEngineeringSchedule()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Civil Engineering Department')
            ->whereDate('date_appointment', '>=', now())
            ->get();

        return view('schedule', ['data' => $data, 'department' => 'EECE Engineering Department']);
    }
    public function ArchitecturalEngineeringSchedule()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Architecture Department')
            ->whereDate('date_appointment', '>=', now())
            ->get();

        return view('schedule', ['data' => $data, 'department' => 'EECE Engineering Department']);
    }
}
