<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'othername',
        'firstname',
        'email',
        'password',
        'is_blocked',
        'status',
        'archive',
        'archive_date'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_blocked' => 'boolean',
        'blocked_at' => 'datetime',
    ];


    // check if user is blocked
    public function isBlocked(): bool
    {
        return $this->is_blocked;
    }


    // block the user 
    public function block(): void
    {
        $this->update([
            'is_blocked' => true,
            'blocked_at' => now(),
            'blocked_by' => '',
        ]);
    }

    // unblock the user
    public function unblock(): void
    {
       $this->update([
            'is_blocked' => false,
            'blocked_at' => null,
            'blocked_by' => '',
        ]);
    }

}
