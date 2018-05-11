<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
      'name','surname','email','phoneNumber','people','date','time',
    ];
}
