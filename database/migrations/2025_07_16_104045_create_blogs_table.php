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
        $table->longText('content'); // Bisa teks, HTML
        $table->json('media')->nullable(); // Gambar, video, link, dsb.
        $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade'); // Pastikan ini mengacu ke tabel `admins`
        $table->timestamp('posted_at')->nullable(); // Bisa manual atau pakai now()
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
