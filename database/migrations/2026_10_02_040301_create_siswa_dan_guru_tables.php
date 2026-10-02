<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    
        if (! Schema::hasTable('siswa')) {
            Schema::create('siswa', function (Blueprint $table) {
                $table->id();
                $table->string('nis')->unique();
                $table->string('nama');
                $table->enum('jenis_kelamin', ['L', 'P']);
                $table->string('kelas');
                $table->string('jurusan')->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->text('alamat')->nullable();
                $table->string('no_hp')->nullable();
                $table->timestamps();
            });
        }


        if (! Schema::hasTable('guru')) {
            Schema::create('guru', function (Blueprint $table) {
                $table->id();
                $table->string('nip')->unique();
                $table->string('nama');
                $table->enum('jenis_kelamin', ['L', 'P']);
                $table->string('mata_pelajaran')->nullable();
                $table->string('jabatan')->nullable();
                $table->date('tanggal_lahir')->nullable();
                $table->text('alamat')->nullable();
                $table->string('no_hp')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('guru');
        Schema::dropIfExists('siswa');
    }
};
