<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_barang',
        'id_pembeli',
        'jumlah',
        'total_harga',
        'alamat',
        'ongkir',
        'status',
    ];
}
