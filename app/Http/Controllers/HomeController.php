<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $dateNow = date('Y-m-d');

        $currentDate = Carbon::now();
        $currentDateInWords = $currentDate->format('F j, Y');

        $data = Appointment::with('studentinformation')
        ->where('appointment_status', 'APPROVED')
        ->where('student_department', 'Computer Studies Department')
        ->where('date_appointment', $dateNow)
        ->get();

        $dataMissed = Appointment::where('appointment_status', 'MISSED')
            ->where('student_department', 'Computer Studies Department')
            ->where('date_appointment', $dateNow)
            ->get();
        $dataCancel = Appointment::where('appointment_status', 'CANCEL')
            ->where('student_department', 'Computer Studies Department')
            ->where('date_appointment', $dateNow)
            ->get();
        $dataqueue = Appointment::where('appointment_status', 'APPROVED')
            ->where('student_department', 'Computer Studies Department')
            ->where('date_appointment', $dateNow)
            ->first();

        return view('home', [
            'data' => $data,
            'dataCancel' => $dataCancel,
            'dataMissed' => $dataMissed,
            'dataqueue' => $dataqueue,
            'currentDateInWords' => $currentDateInWords
        ]);
    }
    public function department($department)
    {
        $dateNow = date('Y-m-d');
        $currentDate = Carbon::now();
        $currentDateInWords = $currentDate->format('F j, Y');

        // Your logic for fetching data based on the selected department
        $data = Appointment::where('appointment_status', 'APPROVED')
            ->where('student_department', $department)
            ->where('date_appointment', $dateNow)
            ->get();

        $dataMissed = Appointment::where('appointment_status', 'MISSED')
            ->where('student_department', $department)
            ->where('date_appointment', $dateNow)
            ->get();

        $dataCancel = Appointment::where('appointment_status', 'CANCEL')
            ->where('student_department', $department)
            ->where('date_appointment', $dateNow)
            ->get();

        $dataqueue = Appointment::where('appointment_status', 'APPROVED')
            ->where('student_department', $department)
            ->where('date_appointment', $dateNow)
            ->first();

        return view('home', [
            'data' => $data,
            'dataCancel' => $dataCancel,
            'dataMissed' => $dataMissed,
            'dataqueue' => $dataqueue,
            'currentDateInWords' => $currentDateInWords,
            'selectedDepartment' => $department,
        ]);
    }
    public function showPost(Appointment $post)    
    {
        return view('editQueue', ['post' => $post]);

    }
    public function editPost(Request $request, Appointment $post)
    {
        $incomingFields = $request->validate([
            'appointment_status' => 'required',
        ]);

        $post->update($incomingFields);
        return redirect('/home');
    }
    public function missPost(Request $request, Appointment $post)
    {
        $incomingFields = $request->validate([
            'appointment_status' => 'required',
        ]);

        $post->update($incomingFields);
        return redirect('/home');
    }
    public function update(Request $request, $id)
    {
        // $appointment = Appointment::find($id);

        // if (!$appointment) {
        //     // Handle record not found
        // }
    
        // $appointment->{'appointment-status'} = $request->input('DONE');
        // $appointment->save();
    
        return view('home');
    }
}
