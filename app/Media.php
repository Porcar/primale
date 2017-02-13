<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{

  /**
       * The table associated with the model.
       *
       * @var string
       */
      protected $table = 'medias';

  public function worker()
  {
      return $this->belongsTo('App\Worker');
  }
}
