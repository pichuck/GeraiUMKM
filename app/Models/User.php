<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sentMessages()
    {
        return $this->hasMany(Chat::class, 'id_sender');
    }

    // Pesan yang diterima oleh user
    public function receivedMessages()
    {
        return $this->hasMany(Chat::class, 'id_receiver');
    }

    public function pekerjaan()
    {
        return $this->hasMany(pekerjaan::class, 'id_user', 'id');
    }

    public function mahasiswa()
    {
        return $this->hasOne(mahasiswa::class, 'id_user', 'id');
    }

    public function apply()
    {
        return $this->hasMany(apply::class, 'id_user', 'id');
    }


}
