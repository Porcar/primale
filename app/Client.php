<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  /**
   * Get the user that owns the client.
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }
}
