<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    use HasFactory;

    protected $table = 'table_artikel';
    protected $fillable = [
        'id_user',
        'judul',
        'foto',
        'isi',
        'tanggal',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
