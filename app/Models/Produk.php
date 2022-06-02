<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Produk as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Produk extends Model
{
    protected $table='produk'; // Eloquent akan membuat model mahasiswa menyimpan record ditabel mahasiswa
	protected $primaryKey = 'id_produk'; // Memanggil isi DB Dengan primarykey
	protected $fillable = [
		'Jenis_Mobil',
		'Harga',
		'Stok',
		'Keterangan',
	];
}
