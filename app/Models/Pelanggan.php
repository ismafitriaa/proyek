<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Pelanggan as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Pelanggan extends Model
{
    protected $table='pelanggan';
    protected $primaryKey = 'id_pelanggan'; // Memanggil isi DB Dengan primarykey
    protected $fillable = [
        'Nik',
        'Nama',
        'Alamat',
        'Telepon',
    ];
}
