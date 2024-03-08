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
        Schema::table('analyizers', function (Blueprint $table) {
           $table->string('user_id')->unique()->nullable();
           $table->string('password')->nullable();
           $table->enum('platfrom',['amazon','goodreads'])->default('amazon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('analyizers', function (Blueprint $table) {
           $table->string('user_id')->unique()->nullable();
           $table->string('password')->nullable();
           $table->enum('platfrom',['amazon','goodreads'])->default('amazon');
        });
    }
};
