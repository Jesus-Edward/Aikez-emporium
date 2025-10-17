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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('up_title');
            $table->string('down_title');
            $table->string('up_image');
            $table->string('down_image');
            $table->text('short_text');
            $table->string('first_mail');
            $table->string('second_mail');
            $table->string('first_phone');
            $table->string('second_phone');
            $table->string('first_address');
            $table->string('second_address');
            $table->string('map_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
