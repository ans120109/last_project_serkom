<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('siswas', 'nama')) {
                $table->string('nama')->nullable();
            }
            if (!Schema::hasColumn('siswas', 'nis')) {
                $table->string('nis')->nullable()->unique();
            }
            if (!Schema::hasColumn('siswas', 'kelas')) {
                $table->string('kelas')->nullable();
            }
            if (!Schema::hasColumn('siswas', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            foreach (['nama', 'nis', 'kelas', 'jenis_kelamin'] as $col) {
                if (Schema::hasColumn('siswas', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
