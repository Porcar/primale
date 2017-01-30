<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SexDate extends Model
{
  public function client()
  {
      return $this->belongsTo('App\Client');
  }

  public function worker()
  {
      return $this->belongsTo('App\Worker');
  }
}
