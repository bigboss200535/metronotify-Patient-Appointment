<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $primaryKey = 'appointment_id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'appointment_id',
        // 'appointment',
        'fullname',
        'telephone',
        'email',
        'service',
        'message',
        'appointment_date',
        'appointment_time',
        // 'appointment_reason',
        // 'appointment_mode', //Telemedicine/Virtual, In-Person,
        'doctor_id',
        'appointment_status',
        'confirmation',
        'status',
        'archive',
        'archive_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'appointment_date' => 'datetime',
        'appointment_time' => 'datetime',
    ];
}
