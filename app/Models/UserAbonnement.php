<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAbonnement extends Model
{
    use HasFactory;

    protected $with = ['user', 'level', 'speciality', 'payment'];

//    protected $casts = [
//        'expireAt' => 'datetime' // Problem with it since Moment js use timestamp in milliseconds instead of seconds like Carbon
//    ];

    public function getExpireAtAttribute()
    {
        return \Carbon\Carbon::createFromTimestamp(intval($this->attributes['expireAt']) / 1000);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::createFromTimestamp(intval($this->attributes['createdAt']) / 1000);
    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class);
    }

    public function speciality() : BelongsTo
    {
        return $this->belongsTo(Speciality::class);
    }

    public function payment() : BelongsTo
    {
        return $this->belongsTo(Payment::class, 'transactionID', 'transactionID');
    }

}
