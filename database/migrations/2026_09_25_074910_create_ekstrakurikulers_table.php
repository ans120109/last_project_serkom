<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->uuid('id_ekstrakurikuler')->primary();
            $table->string('nama', 100);
            $table->text('deskripsi');
            $table->string('gambar', 100)->nullable();
            $table->string('jadwal', 100)->nullable(); // contoh: "Setiap Sabtu, 08.00 - 10.00"
            $table->foreignId('id_user')->constrained('users', 'id')->onUpdate('cascade')->onDelete('restrict'); // pembina / pembuat data

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};
