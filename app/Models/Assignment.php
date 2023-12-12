<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'assignment_name', // Add this line
        'assignment_description',
        'assignment_start_date',
        'assignment_end_date',
    ];

}
