<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';

    protected $fillable = [
        'nama',
        'alamat',
        'jenjang',
        'tahun_berdiri',
        'jumlah_siswa',
        'prestasi',
        'foto',
    ];

    // Pemakaian di view: $profil->foto_url
    public function getFotoUrlAttribute(): ?string
    {
        return $this->foto ? asset('storage/' . $this->foto) : null;
    }
}
