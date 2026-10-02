<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->text('alamat')->nullable();
            $table->string('jenjang')->nullable();
            $table->string('tahun_berdiri')->nullable();
            $table->integer('jumlah_siswa')->nullable();
            $table->text('prestasi')->nullable();
            $table->string('foto')->nullable();
            $table->text('tentang')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sekolah');
    }
};
