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
  
  public function tagsworkers()
  {
      return $this->hasMany('App\TagWorker');
  }
  public function sexdates()
  {
      return $this->hasMany('App\Sexdate');
  }

  public function schedule()
  {
      return $this->hasOne('App\Schedule');
  }

  public function medias()
  {
      return $this->hasMany('App\Media');
  }

}
