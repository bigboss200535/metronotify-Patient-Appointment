<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $table = 'newsletter_subscription';
    protected $primaryKey = 'subscription_id';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'subscription_id',
        'is_active',
        'email_verified_at',
        'status',
        'date_added'
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
    ];

    protected $casts = [
        'email'     => 'string',
        'status'      => 'string',
        'archived'    => 'string',
        'archived_date' => 'date',
    ];

}
