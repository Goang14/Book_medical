<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationSchedule extends Model
{
    use HasFactory;
    protected $table = 'examination_schedule';

    protected $fillable = [
        'user_id',
        'department_id',
        'doctor_name',
        'name_patient',
        'email',
        'phone',
        'sex',
        'address',
        'appointment_date',
        'appointment_time',
        'status',
        'note',
    ];
}
