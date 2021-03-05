<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'properti_detail_id',
        'nm_konsumen',
        'nik',
        'pekerjaan',
        'alamat',
        'no_hp',
        'booking',
        'sisa_pembayaran',
        'jenis_pembayaran',
    ];
}
