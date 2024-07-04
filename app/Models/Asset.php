<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model {

  protected $fillable = [
    'artwork_id',
    'asset_id',
    'title',
    'title_formatted',
    'image_url',
    'width',
    'height',
    'asset_type',
    'has_image',
  ];

  public function artwork() {
    return $this->belongsTo(Artwork::class, 'artwork_id');
  }
}
