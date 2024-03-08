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
        Schema::table('prompt_outputs', function (Blueprint $table) {
            $table->unsignedBigInteger('ai_assistant_id')->constrained('ai_assistants')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prompt_outputs', function (Blueprint $table) {
            $table->dropForeign(['ai_assistant_id']);
            $table->dropColumn('ai_assistant_id');
        });
    }
};
