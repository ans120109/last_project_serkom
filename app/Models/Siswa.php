<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'jenis_kelamin',
        'kelas',
        'sekolah_asal',
        'tanggal_lahir',
        'alamat',
        'no_hp',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];
}
