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
        Schema::create('ai_chainings', function (Blueprint $table) {
            $table->id();
            $table->integer('position')->default(1);
            $table->unsignedBigInteger('ai_assistant_id')->constrained('ai_assistants');
            $table->enum('type',['amazon','goodreads','b&n'])->default('amazon');
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ai_chainings');
    }
};
