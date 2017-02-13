<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexdate extends Model
{
  public function client()
  {
      return $this->belongsTo('App\Client');
  }

  public function worker()
  {
      return $this->belongsTo('App\Worker');
  }

  public function tagsworkers()
  {
      return $this->belongsToMany('App\TagWorker');
  }

}
