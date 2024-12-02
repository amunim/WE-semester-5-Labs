<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendance';
    public $timestamps = false; // No `created_at` or `updated_at` in the table

    protected $fillable = [
        'classid',
        'studentid',
        'isPresent',
        'comments',
        'marked_at',
    ];
}
