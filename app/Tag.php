<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function worker()
  {
      return $this->belongsToMany('App\Worker');
  }
}
