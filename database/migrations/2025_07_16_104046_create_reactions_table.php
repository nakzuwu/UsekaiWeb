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
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_id')->constrained()->onDelete('cascade');
            $table->string('emoji'); // contoh: 😄, 😢, ❤️, dll
            $table->ipAddress('ip_address'); // untuk tracking user non-login
            $table->timestamps();

            // Optional: hanya boleh satu reaksi per IP per blog per emoji
            $table->unique(['blog_id', 'ip_address', 'emoji']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
