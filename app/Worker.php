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
}
