<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function workers()
  {
      return $this->belongsToMany('App\Worker');
  }
}
