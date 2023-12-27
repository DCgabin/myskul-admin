<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Speciality extends Model
{
    use HasFactory;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function usersAbonnements(): HasMany
    {
        return $this->hasMany(UserAbonnement::class);
    }

    public function getNameAttribute(): string
    {
        return $this->speciality;
    }
}
