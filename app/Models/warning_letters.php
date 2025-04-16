<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class warning_letters extends Model
{
    protected $fillable = [
        'employee_id',
        'type',
        'date',
        'violation',
        'consequences',
        'improvement_plan',
        'issued_by',
        'acknowledged',
        'acknowledged_at'
    ];
}