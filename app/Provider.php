<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  /**
   * Get the user that owns the client.
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }


    public function workers()
    {
        return $this->hasMany('App\Worker');
    }
}
