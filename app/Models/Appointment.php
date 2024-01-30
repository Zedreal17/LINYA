<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'linyatbl';

    protected $fillable = ['appointment_queue','student_name','student_department','student_course','date_appointment','appointment_status','appointment_time' ];

    public function studentinformation()
    {
        return $this->belongsTo(StudentInformation::class, 'studentCount', 'studentCount');
    }
}
