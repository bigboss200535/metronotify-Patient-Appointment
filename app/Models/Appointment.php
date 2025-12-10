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
        'fullname',
        'telephone',
        'email',
        'service',
        'message',
        'appointment_date',
        'appointment_time',
        'appointment_mode',
        'doctor_id',
        'appointment_status',
        'confirmation',
        'status',
        'added_id',
        'added_date',
        'updated_by',
        'confirmation_id',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date'
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
