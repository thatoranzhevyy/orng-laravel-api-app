<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {

    Schema::create('artists', function (Blueprint $table) {
      $table->id();
      $table->string('artist_id')->unique();
      $table->string('username')->nullable();
      $table->longText('headline')->nullable();
      $table->string('full_name')->nullable();
      $table->string('permalink')->nullable();
      $table->string('medium_avatar_url')->nullable();
      $table->string('large_avatar_url')->nullable();
      $table->string('small_cover_url')->nullable();
      $table->timestamps();
    });

    Schema::create('artworks', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('artist_id')->index();
      $table->string('hash_id')->unique();
      $table->string('title')->nullable();
      $table->longText('description_html')->nullable();
      $table->string('permalink')->nullable();
      $table->string('cover_url')->nullable();
      $table->string('slug')->nullable();
      $table->timestamp('published_at')->nullable();
      $table->timestamps();

      $table->foreign('artist_id')->references('id')->on('artists')->cascadeOnDelete();
    });

    Schema::create('assets', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('artwork_id')->index();
      $table->string('asset_id')->unique()->nullable();
      $table->string('title')->nullable();
      $table->string('title_formatted')->nullable();
      $table->string('image_url')->nullable();
      $table->string('width')->nullable();
      $table->string('height')->nullable();
      $table->string('asset_type')->nullable();
      $table->boolean('has_image')->default(true);
      $table->timestamps();

      $table->foreign('artwork_id')->references('id')->on('artworks')->cascadeOnDelete();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('artists');
    Schema::dropIfExists('artworks');
    Schema::dropIfExists('assets');
  }
};
