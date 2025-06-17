<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'idPelanggan';
    public $timestamps = false;

    protected $fillable = [
        'namaPelanggan',
        'emailPelanggan',
        'kontakPelanggan',
        'password',
    ];
}