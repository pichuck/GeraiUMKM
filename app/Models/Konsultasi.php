<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $table = 'table_konsultasi';

    protected $fillable = [
        'id_user',
        'status_aktivitas_bisnis',
        'nama_pelaku_bisnis',
        // 'tipe_identitas',
        'email',
        'alamat',
        // 'provinsi',
        // 'no_identitas',
        // 'kota',
        'detail_kendala_bisnis',
        'kendala_bisnis',
        'kategori_kebutuhan',
        'deskripsi_masalah'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
