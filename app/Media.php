<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  public function worker()
  {
      return $this->belongsTo('App\Worker');
  }
}
