<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGroup extends Model
{
    use HasFactory;

    protected $table = 'contact_groups';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'group_name',
        'description',
        'contact_count',
        'status',
        'added_id',
        'added_date',
        'archived',
        'archived_id',
        'archived_by',
        'archived_date',
    ];

    protected $casts = [
        'contact_count' => 'integer',
        'added_date' => 'datetime',
        'archived_date' => 'datetime',
    ];

    /**
     * Scope a query to only include active groups.
     */
    public function scopeActive($query)
    {
        return $query->where('archived', 'No');
    }

    /**
     * Get contacts in this group.
     */
    public function contacts()
    {
        return $this->hasMany(Contacts::class, 'telephone_group', 'group_name');
    }

    /**
     * Get contacts count for this group.
     */
    public function getContactCount()
    {
        return Contacts::where('telephone_group', $this->group_name)
            ->where('archived', 'No')
            ->count();
    }

    /**
     * Get the user who added the group.
     */
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_id', 'user_id');
    }

    /**
     * Update contact count for this group.
     */
    public function updateContactCount()
    {
        $this->contact_count = $this->contacts()->where('archived', 'No')->count();
        $this->save();
    }
}
