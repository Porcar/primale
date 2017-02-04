<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
  /**
   * Get the user that owns the client.
   */

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function provider()
  {
      return $this->belongsTo('App\Provider');
  }
  public function tags()
  {
      return $this->belongsToMany('App\Tag');
  }
  public function sexdates()
  {
      return $this->hasMany('App\Sexdate');
  }
}
