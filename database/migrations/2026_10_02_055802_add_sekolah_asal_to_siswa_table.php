<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('siswa', 'sekolah_asal')) {
            Schema::table('siswa', function (Blueprint $table) {
                $table->string('sekolah_asal')->nullable()->after('kelas');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('siswa', 'sekolah_asal')) {
            Schema::table('siswa', function (Blueprint $table) {
                $table->dropColumn('sekolah_asal');
            });
        }
    }
};
