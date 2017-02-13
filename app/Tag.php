<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function tagsworkers()
  {
      return $this->hasMany('App\TagWorker');
  }
}
