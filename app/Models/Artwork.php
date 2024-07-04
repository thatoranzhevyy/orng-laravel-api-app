<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artwork extends Model {
  protected $fillable = [
    'artist_id',
    'hash_id',
    'title',
    'description_html',
    'permalink',
    'cover_url',
    'slug',
    'published_at',
  ];


  public function artist() {
    return $this->belongsTo(Artist::class, 'artist_id');
  }

  public function assets() {
    return $this->hasMany(Asset::class, 'artwork_id');
  }
}
