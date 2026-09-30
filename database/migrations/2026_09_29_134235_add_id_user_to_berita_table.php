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
        Schema::table('berita', function (Blueprint $table) {
            // Nullable supaya berita lama (yang tidak diketahui penulisnya) tetap valid,
            // dan onDelete set null supaya user tetap bisa dihapus tanpa menyeret beritanya.
            $table->foreignId('id_user')
                  ->nullable()
                  ->after('jenis')
                  ->constrained('users', 'id')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            $table->dropConstrainedForeignId('id_user');
        });
    }
};
