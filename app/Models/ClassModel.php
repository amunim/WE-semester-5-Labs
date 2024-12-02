<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';
    public $timestamps = false;

    protected $fillable = [
        'teacherid',
        'starttime',
        'endtime',
        'credit_hours',
    ];
}
