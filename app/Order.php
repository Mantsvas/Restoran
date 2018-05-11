<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'cart'
    ];

    public function toUser()
    {
        return $this->belongsTo(User::class);
    }
}
