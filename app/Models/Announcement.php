<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['announcement_details', 'date_posted', 'date_until', 'announcement_status','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
