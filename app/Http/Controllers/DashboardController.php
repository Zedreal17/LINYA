<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentList;
use Illuminate\Support\Facades\DB;
use PDF;
class DashboardController extends Controller
{
    public function countAppointments()
    {
        // Count appointments for each status
        $countMissed = AppointmentList::where('appointment_status', 'MISSED')->count();
        $countCancel = AppointmentList::where('appointment_status', 'CANCEL')->count();
        $countPending = AppointmentList::where('appointment_status', 'APPROVED')->count();
        $countComplete = AppointmentList::where('appointment_status', 'DONE')->count();

        $data = DB::table('linyatbl')
            ->select('appointment_reasons')
            ->get();

        // Initialize an array to store the word counts
        $wordCounts = [];

        // Loop through each row in the result
        foreach ($data as $row) {
            // Explode the appointment_reasons into an array of words
            $words = explode(' ', $row->appointment_reasons);

            // Count the occurrences of each word
            foreach ($words as $word) {
                $word = strtolower($word); // Convert to lowercase for case-insensitivity
                if (!isset($wordCounts[$word])) {
                    $wordCounts[$word] = 1;
                } else {
                    $wordCounts[$word]++;
                }
            }
        }

        // Convert the word counts to the format expected by Morris.js
        $wordData = [];
        foreach ($wordCounts as $word => $count) {
            $wordData[] = ['word' => $word, 'count' => $count];
        }

        // Sort the data by count in descending order
        usort($wordData, function ($a, $b) {
            return $b['count'] - $a['count'];
        });

        $departmentCounts = DB::table('linyatbl')
            ->select('student_department', DB::raw('count(*) as count'))
            ->groupBy('student_department')
            ->get();


        $data = AppointmentList::select(
            'student_department',
            \DB::raw('COUNT(CASE WHEN appointment_status = "APPROVED" THEN 1 END) AS approved_count'),
            \DB::raw('COUNT(CASE WHEN appointment_status = "REJECTED" THEN 1 END) AS rejected_count'),
            \DB::raw('COUNT(CASE WHEN appointment_status = "DONE" THEN 1 END) AS done_count'),
            \DB::raw('COUNT(CASE WHEN appointment_status = "APPROVAL" THEN 1 END) AS approval_count')
        )
        ->groupBy('student_department')
        ->get();

        // Return an array with the counts and the data
        return view('dashboard', [
            'appointments' => [
                'Missed' => $countMissed,
                'Cancel' => $countCancel,
                'Pending' => $countPending,
                'Complete' => $countComplete,
            ],
            'wordData' => $wordData,
            'departmentCounts' => $departmentCounts,
            'data' => $data
        ]);
    }

    public function generatePdfForDepartmentCount()
    {
        $departmentCounts = DB::table('linyatbl')
            ->select('student_department', DB::raw('count(*) as count'))
            ->groupBy('student_department')
            ->get();

        $pdf = PDF::loadView('dashboard.pdf.department_count', ['departmentCounts' => $departmentCounts]);

        return $pdf->download('department_count_report.pdf');
    }
    public function generatePdfForDepartmentRequest()
    {
        $departmentData = DB::table('linyatbl')
        ->select('appointment_queue', 'student_department', 'student_course','date_appointment','appointment_reasons')
        ->where('appointment_status', 'done')
        ->get();


        $pdf = PDF::loadView('dashboard.pdf.departmentReqeust', ['departmentData' => $departmentData]);

        return $pdf->download('Request.pdf');
    }
    public function summarydep()
    {
        $sumData = AppointmentList::select(
            'student_department',
            \DB::raw('COUNT(CASE WHEN appointment_status = "APPROVED" THEN 1 END) AS approved_count'),
            \DB::raw('COUNT(CASE WHEN appointment_status = "REJECTED" THEN 1 END) AS rejected_count'),
            \DB::raw('COUNT(CASE WHEN appointment_status = "DONE" THEN 1 END) AS done_count'),
            \DB::raw('COUNT(CASE WHEN appointment_status = "APPROVAL" THEN 1 END) AS approval_count')
        )
        ->groupBy('student_department')
        ->get();


        $pdf = PDF::loadView('dashboard.pdf.summarydep', ['sumData' => $sumData]);

        return $pdf->download('Summary Report.pdf');
    }
    
}
