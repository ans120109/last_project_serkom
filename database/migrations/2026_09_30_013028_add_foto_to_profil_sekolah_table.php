<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('profil_sekolah')) {
            // Tabel sudah ada: cukup pastikan kolom foto tersedia.
            if (! Schema::hasColumn('profil_sekolah', 'foto')) {
                Schema::table('profil_sekolah', function (Blueprint $table) {
                    $table->string('foto')->nullable();
                });
            }
            return;
        }

        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('jenjang', 100);
            $table->unsignedSmallInteger('tahun_berdiri');
            $table->unsignedInteger('jumlah_siswa')->default(0);
            $table->text('prestasi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sekolah');
    }
};
