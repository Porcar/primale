<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  /**
   * Get the user that owns the provider.
   */
  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
