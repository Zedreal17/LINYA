<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AppointmentList;
use App\Models\FacultyInformation;
use Humans\Semaphore\Laravel\Facades\Semaphore;

class AppointmentController extends Controller
{

    public function index()
    {
        $data = AppointmentList::where('appointment_status', 'APPROVAL')
            ->get();

        $countMissed = AppointmentList::where('appointment_status', 'MISSED')->count();
        $countCancel = AppointmentList::where('appointment_status', 'CANCEL')->count();
        $countPending = AppointmentList::where('appointment_status', 'APPROVED')->count();
        $countComplete = AppointmentList::where('appointment_status', 'DONE')->count();
        $facultyNames = FacultyInformation::all(['facultyName', 'facultyName']);
        // Other variables like $roles and $users should be defined before this point

        // Return an array with the counts and other data
        return view('appointment', [
            'appointments' => [
                'Missed' => $countMissed,
                'Cancel' => $countCancel,
                'Pending' => $countPending,
                'Complete' => $countComplete,
            ],
            'data' => $data,
            'data1' => $facultyNames, // This is a single data array
        ]);
    }

    public function getAppointmentDetails($id)
    {
        // Fetch appointment details from the database or another source
        $appointment = Appointment::find($id);

        // Check if appointment exists
        if (!$appointment) {
            return response()->json(['error' => 'Appointment not found'], 404);
        }

        // Return JSON response with appointment details
        return response()->json([
            'appointment_id' => $id,
            'appointment_details' => $appointment,
        ]);
    }

    public function updateAppointment(Request $request, AppointmentList $post)
    {


        $approvedValue = $request->input('APPROVED', 'APPROVED');
        $post->update(['appointment_status' => $approvedValue]);

        // Send SMS using Semaphore when appointment is approved
        if ($approvedValue === 'APPROVED' && $post->studentinformation) {
            $phoneNumber = $post->studentinformation->pNumber;
            Semaphore::message()->send(
                $phoneNumber,
                'Appointment Success'
            );
        }

        return redirect('/appointment');
    }
    public function updateAppointmentwithfaculty(Request $request, $id)
{
    // Fetch the appointment details
    $appointment = AppointmentList::find($id);

    if (!$appointment) {
        return Redirect::back()->withErrors(['error' => 'Appointment not found']);
    }

    // Fetch faculty details
    $facultyID = $request->input('facultyID');
    $faculty = FacultyInformation::find($facultyID);

    if (!$faculty) {
        return Redirect::back()->withErrors(['error' => 'Faculty not found']);
    }

    // Update the appointment status to 'APPROVED'
    $appointment->update(['appointment_status' => 'APPROVED']);

    // Send SMS to student
    if ($appointment->studentinformation) {
        $studentPhoneNumber = $appointment->studentinformation->pNumber;
        Semaphore::message()->send($studentPhoneNumber, 'Appointment Success student');
    }

    // Send SMS to faculty
    if ($faculty->facultyContact) {
        $facultyPhoneNumber = $faculty->facultyContact;
        Semaphore::message()->send($facultyPhoneNumber, 'Appointment Success teacher');
    }

    return Redirect::back()->with('success', 'Appointment approved, and SMS sent successfully!');
}


    public function rejectAppointment(Request $request, AppointmentList $post)
    {

        $rejectedValue = $request->input('REJECTED', 'REJECTED');
        $post->update(['appointment_status' => $rejectedValue]);
        if ($rejectedValue === 'REJECTED') {
            $phoneNumber = $post->studentinformation->pNumber;
            Semaphore::message()->send(
                $phoneNumber,
                'Appointment Rejected'
            );
        }
        return redirect('/appointment');
    }

    public function countAppointments()
    {
        // Count appointments for each status

    }
    public function getFacultyNames()
    {

    }

}
