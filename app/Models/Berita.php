<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [

        'judul',
        'tanggal',
        'isi',
        'jenis',
        'id_user',

    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    /**
     * User yang menginput berita ini.
     */
    public function penulis()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
