<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public function provider()
  {
      return $this->belongsTo('App\Provider');
  }

  public function workers()
  {
      return $this->belongsToMany('App\Worker')->withPivot('active');
  }
  

}
