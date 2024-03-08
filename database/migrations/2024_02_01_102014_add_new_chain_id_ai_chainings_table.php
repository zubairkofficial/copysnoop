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
        Schema::table('ai_chainings', function (Blueprint $table) {
            $table->unsignedBigInteger('ai_chain_id')->constrained('ai_chains');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ai_chainings', function (Blueprint $table) {
            $table->unsignedBigInteger('chain_id');
            $table->foreign('chain_id')->references('id')->on('ai_chains')->onDelete('cascade');
        });
    }
};
