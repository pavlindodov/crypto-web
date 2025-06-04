<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    protected $fillable = [
        'coingecko_id', 'symbol', 'name', 'image'
    ];

    public function favoredByUsers()
    {
        return $this->belongsToMany(User::class, 'crypto_user')->withPivot('available')->withTimestamps();
    }
}
