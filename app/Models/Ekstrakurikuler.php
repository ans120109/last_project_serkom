<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakurikulers';
    protected $primaryKey = 'id_ekstrakurikuler';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_ekstrakurikuler',
        'nama',
        'deskripsi',
        'gambar',
        'jadwal',
        'id_user',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id_ekstrakurikuler)) {
                $model->id_ekstrakurikuler = (string) Str::uuid();
            }
        });
    }

    public function pembina()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
