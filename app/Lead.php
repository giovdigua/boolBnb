<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Lead extends Model
{
    protected $fillable = [
      'nome',
      'email_mittente',
      'messaggio',
      'oggetto',
      'apartment_id'
    ];

    public function apartment(){
      return $this->belongsTo(Apartment::class);
    }
}
