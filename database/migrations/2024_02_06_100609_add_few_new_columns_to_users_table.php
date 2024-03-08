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
        Schema::table('users', function (Blueprint $table) {
            $table->string('wallet_amount')->default(0);
            $table->unsignedBigInteger('package_id')->constrained('packages')->nullable();
            $table->integer('reviews_request')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->string('address')->nullable();
            $table->String('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->integer('max_words')->default(0);
            $table->integer('total_words')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('wallet_amount')->default(0);
            $table->unsignedBigInteger('package_id')->constrained('packages')->nullable();
            $table->integer('reviews_request')->default(0);
            $table->integer('total_reviews')->default(0);
            $table->string('address')->nullable();
            $table->String('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->integer('max_words')->default(0);
            $table->integer('total_words')->default(0);
        });
    }
};
