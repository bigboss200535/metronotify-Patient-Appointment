<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
   use HasFactory;

    protected $table = 'enquiry';
    protected $primaryKey = 'enquiry_id';
    public $timestamps = false;

    protected $fillable = [
        'enquiry_id',
        'fullname',
        'telephone',
        'email',
        'subject',
        'service',
        'page_type',
        'message',
        'read_status',
        'replied', //user who replied
        'replied_id',
        'status',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
    ];

    protected $casts = [
        'read_status' => 'string',
        'replied'     => 'string',
        'status'      => 'string',
        'archived'    => 'string',
        'archived_date' => 'date',
    ];

    public function repliedUser()
    {
        return $this->belongsTo(User::class, 'replied_id', 'user_id');
    }
}
