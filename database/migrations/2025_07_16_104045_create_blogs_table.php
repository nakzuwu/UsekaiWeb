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
         Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content'); // Konten bisa mengandung teks, HTML, dsb.
            $table->json('media')->nullable(); // Opsional, bisa untuk gambar/video/gif/link
            $table->foreignId('admin_id')->constrained()->onDelete('cascade'); // Admin yang memposting
            $table->timestamp('posted_at')->nullable(); // Tanggal posting manual
            $table->timestamps(); // created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
