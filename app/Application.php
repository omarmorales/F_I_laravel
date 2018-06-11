<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    public function vacancy()
    {
      return $this->belongsTo('App\Vacancy');
    }
}
