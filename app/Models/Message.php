<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'sendAt', 'message', 'level_id', 'speciality_id', 'user_id'];
    protected $with = ['level', 'speciality'];
    protected $casts = ['sendAt' => 'datetime'];

    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function speciality() : BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }
}
