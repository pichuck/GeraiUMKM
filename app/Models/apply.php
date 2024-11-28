<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class apply extends Model
{
    use HasFactory;
    protected $table = 'table_apply';
    protected $fillable = [
        'id_user',
        'id_project',
        'status',
        'dokumen',
        'nama',
        'deskripsi_diri',
        'jurusan',
        'pengalaman_organisasi',
        'pengalaman_kerja'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
    public function project()
    {
        return $this->belongsTo(pekerjaan::class, 'id_project', 'id');
    }
    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'apply_id', 'id');
    }
}
