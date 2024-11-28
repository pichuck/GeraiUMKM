<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    use HasFactory;

    protected $table = 'table_like';
    protected $fillable = [
        'id_artikel',
        'id_user'
    ];

    public function artikel()
    {
        return $this->belongsTo(artikel::class, 'id_artikel', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
