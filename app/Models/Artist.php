<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model {

  protected $fillable = [
    'artist_id',
    'username',
    'headline',
    'full_name',
    'permalink',
    'large_avatar_url',
    'small_cover_url',
  ];

  public function artworks() {
    return $this->hasMany(Artwork::class, 'artist_id');
  }
}
