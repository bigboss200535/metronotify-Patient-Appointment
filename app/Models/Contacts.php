<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory; //HasUuids, HasApiTokens, Notifiable;

    protected $table = 'contacts';
    protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';
    // public $timestamps = false;


    protected $fillable = [
        'id',
        'telephone',
        'telephone_group',
        'archived',
        // 'archived_id',
        'archived_by',
        'archived_date',
    ];
}