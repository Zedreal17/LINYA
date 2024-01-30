<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;
    protected $table = 'studentinformation';
    protected $fillable = [
        'studentCount',
        'studentID',
        'fname',
        'lname',
        'pNumber',
        'eMail',
        'pWord',
        'cDepartment',
        'course',
        'sStatus',
        'dateEntry',
        // Add other attributes as needed
    ];

}
