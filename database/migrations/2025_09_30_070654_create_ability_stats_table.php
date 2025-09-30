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
        Schema::create('ability_stats', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('title');
            $table->string('value1');
            $table->string('title1');
            $table->string('value2');
            $table->string('title2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ability_stats');
    }
};
