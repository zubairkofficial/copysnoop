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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('duration')->default(0);
            $table->text('description'); // Change to 'text' data type
            $table->decimal('price', 10, 2); // Change to numeric data type
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('reviews_requested')->default(3);
            $table->enum('platform',['all','amazon','goodreads','b&n'])->default('all');
            $table->integer('files')->default(0);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
