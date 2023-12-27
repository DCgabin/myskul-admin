<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * With roles
     */
    protected $with = ['roles', 'level', 'speciality'];

    /**
     * The attributes that are guarded.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Set users attributes
     */
    public function setPasswordAttribute(string $password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * User relationships
     */

    public function roles() : BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id')
            ->withTimestamps();
    }

    public function payments() : HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function speciality() : BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }

    public function userAbonnements() : HasMany
    {
        return $this->hasMany(UserAbonnement::class);
    }
}
