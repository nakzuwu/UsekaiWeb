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
        Schema::create('talents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('stage_name')->unique();
            $table->date('birthday')->nullable();
            $table->string('fan_name')->nullable();
            $table->text('description')->nullable();
            $table->string('avatar')->nullable(); // path ke gambar
            $table->json('socials')->nullable(); // link YouTube, Twitter, dsb
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('talents');
    }
};
