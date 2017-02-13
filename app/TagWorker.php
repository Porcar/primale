<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagWorker extends Model
{
  public function tag()
  {
      return $this->belongsTo('App\Tag');
  }

  public function worker()
  {
      return $this->belongsTo('App\Worker');
  }

  public function sexdates()
  {
      return $this->belongsToMany('App\Sexdate');
  }


}
