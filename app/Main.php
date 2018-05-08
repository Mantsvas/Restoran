<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main extends Model
{

  protected $fillable = [
      'title'
  ];
  public function toDishes()
  {
    return $this->hasMany(Dish::class);
  }
}
