<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    use HasFactory;

    protected $table = 'sms';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'sms_content',
        'sms_type',
        'recipient_number',
        'status',
        'added_id',
        'added_date',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
    ];

    protected $casts = [
        'status'      => 'string',
        'archived'    => 'string',
        'added_date' => 'datetime',
        'archived_date' => 'datetime',
    ];

    /**
     * Scope a query to only include delivered SMS.
     */
    public function scopeDelivered($query)
    {
        return $query->where('status', 'delivered');
    }

    /**
     * Scope a query to only include not delivered SMS.
     */
    public function scopeNotDelivered($query)
    {
        return $query->where('status', '!=', 'delivered');
    }

    /**
     * Scope a query to only include pending SMS.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope a query to only include active SMS.
     */
    public function scopeActive($query)
    {
        return $query->where('archived', 'No');
    }

    /**
     * Get the user who added the SMS.
     */
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_id', 'user_id');
    }
}
