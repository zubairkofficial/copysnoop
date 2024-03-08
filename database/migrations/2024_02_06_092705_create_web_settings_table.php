<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('web_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Reviewonia');
            $table->string('tag_line')->default('Reviewonia');
            $table->string('copy_rights')->default('Reviewonia');
            $table->string('email')->default('reviewonia@gmail.com');
            $table->string('phone')->default('0123456789');
            $table->string('facebook')->default('https://www.facebook.com');
            $table->string('instagram')->default('https://www.instagram.com');
            $table->string('twitter')->default('https://www.twitter.com');
            $table->string('linkedin')->default('https://www.linkedin.com');
            $table->string('youtube')->default('https://www.youtube.com');
            $table->string('pinterest')->default('https://www.pinterest.com');
            $table->string('whatsapp')->default('https://www.whatsapp.com');
            $table->string('telegram')->default('https://www.telegram.com');
            $table->text('map')->default('map.google.com');
            $table->string('address')->default('New York, NY, USA');
            $table->string('logo')->default('logo.png');
            $table->string('favicon')->default('favicon.ico');
            $table->string('url')->default('http://127.0.0.1:8080/');
            $table->string('footer_logo')->default('logo.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_settings');
    }
};
