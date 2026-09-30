<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        // Role 'guru' sudah tidak dipakai lagi. Kalau tidak dipindahkan dulu,
        // MODIFY di bawah akan memotong nilainya menjadi string kosong.
        DB::table('users')->where('role', 'guru')->update(['role' => 'operator']);

        // Ubah kolom role agar menerima:
        // siswa, operator, admin
        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM('siswa', 'operator', 'admin')
            NOT NULL
            DEFAULT 'siswa'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (DB::getDriverName() !== 'mysql') {
            return;
        }

        DB::table('users')->where('role', 'operator')->update(['role' => 'siswa']);

        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM('siswa', 'admin')
            NOT NULL
            DEFAULT 'siswa'
        ");
    }
};
