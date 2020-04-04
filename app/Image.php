<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Image extends Model
{
    protected $guarded = [];

    public function apartment(){
      return $this->belongsTo(Apartment::class);
    }
}
