<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyInformation extends Model
{
    use HasFactory;
    protected $table = 'facultyinfo';

    protected $primaryKey = 'facultyID'; // Replace with the actual primary key column name
    protected $fillable = ['facultyName', 'facultyContact', 'facultyStatus'];

}
