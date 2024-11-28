<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    protected $table = 'table_chat';

    protected $fillable = [
        'id_receiver',
        'id_sender',
        'pesan',
        'tanggal',
        'is_read'
    ];

    public function receiver()
    {
        return $this->belongsTo(User::class, 'id_receiver', 'id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'id_sender', 'id');
    }

}
