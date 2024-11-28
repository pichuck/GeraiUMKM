<?php

namespace App\Models;

use App\Models\apply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achievement extends Model
{
    use HasFactory;

    protected $table = 'table_achievement';
    protected $fillable = [
        'apply_id',
        'deskripsi',
    ];

    public function apply()
    {
        return $this->belongsTo(apply::class);
    }
}
