<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class umkm extends Model
{
    use HasFactory;

    protected $table = 'table_umkm';
    protected $fillable = [
        'id_user',
        'nama_umkm',
        'deskripsi',
        'kategori',
        'foto_profil',
        'foto_sampul',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'alamat',
        'informasi_pemilik',
        'informasi_bisnis'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
