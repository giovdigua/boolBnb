<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Options;
use App\Sponsor;
use App\Image;
use App\Leads;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class Apartment extends Model implements Viewable
{
  use InteractsWithViews;

  protected $fillable = [
    'titolo',
    'stanze',
    'posti_letto',
    'bagni',
    'dimensioni',
    'descrizione',
    'indirizzo',
    'paese',
    'lon',
    'lat',
    'user_id',
    'visibilita'
  ];

  // protected $guarded = [];


  public function user(){
    return $this->belongsTo(User::class);
  }

  public function options(){
    return $this->belongsToMany(Option::class);
  }

  public function sponsors(){
    return $this->belongsToMany(Sponsor::class)->withPivot('due_date')->withTimestamps();
  }

  public function images(){
    return $this->hasMany(Image::class);
  }

  public function leads(){
    return $this->hasMany(Lead::class);
  }
}
