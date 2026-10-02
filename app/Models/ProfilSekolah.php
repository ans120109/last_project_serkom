<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $table = 'profil_sekolah';

    protected $fillable = [
        'nama_sekolah',
        'alamat',
        'jenjang',
        'tahun_berdiri',
        'jumlah_siswa',
        'prestasi',
        'foto',
        'tentang',
        'visi',
        'misi',
    ];
}
