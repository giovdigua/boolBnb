<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Sponsor extends Model
{
    protected $fillable = [
      'nome',
      'prezzo',
       'durata'
    ];

    public function apartments(){
      return $this->belongsToMany(Apartment::class);
    }
}
