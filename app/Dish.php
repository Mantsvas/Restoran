<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
  protected $fillable = [
      'name', 'description','price','main_id','photourl'
  ];

  public function toMain()
  {
    return $this->belongsTo(Main::class,'main_id');
  }
}
