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
        DB::statement("
            ALTER TABLE users
            MODIFY role ENUM('siswa', 'admin')
            NOT NULL
            DEFAULT 'siswa'
        ");
    }
};
