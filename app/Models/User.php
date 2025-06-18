<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'pelanggan'; // Nama tabel sesuai database

    public $timestamps = false;

    protected $fillable = [
        'namaPelanggan',
        'emailPelanggan',
        'kontakPelanggan',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function getAuthIdentifierName()
    {
        return 'emailPelanggan'; // Kolom yang digunakan untuk login
    }

    // Override atribut untuk compatibility
    public function getNameAttribute()
    {
        return $this->namaPelanggan;
    }

    public function getEmailAttribute()
    {
        return $this->emailPelanggan;
    }

    public function getPhoneAttribute()
    {
        return $this->kontakPelanggan;
    }
}