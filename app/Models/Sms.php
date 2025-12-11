<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;

    protected $table = 'sms';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'sms_content',
        'sms_type',
        'recipient_number',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
    ];

    protected $casts = [
        'status'      => 'string',
        'archived'    => 'string',
        'archived_date' => 'date',
    ];
}
