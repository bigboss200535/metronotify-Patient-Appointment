<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory, HasUuids, HasApiTokens, Notifiable;

    protected $table = 'web_contacts';
    protected $primaryKey = 'contact_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'contact_id',
        'name',
        'telephone',
        'email',
        'subject',
        'message',
        'read_status',
        'replied', //user who replied
        'replied_id',

        'status',
        'archived'
        'archived_id',
        'archived_by',
        'archived_date',
    ];
}