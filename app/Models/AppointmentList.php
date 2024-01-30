<?php

namespace App\Models;

use App\Models\StudentInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentList extends Model
{
    use HasFactory;

    protected $table = 'linyatbl';

    protected $fillable = ['appointment_queue','studentCount','student_department','student_course','date_appointment','appointment_status','appointment_time','appointment_reasons', 'updated_at', 'student_year', 'natureCounselling', 'teacherInvovled', 'subjectInvolved' ];

    public function studentinformation()
    {
        return $this->belongsTo(StudentInformation::class, 'studentCount', 'studentCount');
    }
}
