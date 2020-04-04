<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Option extends Model
{
    protected $fillable = [
      'nome'
    ];

    public function apartments(){
      return $this->belongsToMany(Apartment::class);
    }
}
