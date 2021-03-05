<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    protected $fillable = [
        'nm_properti',
        'jenis_properti',
        'alamat',
        'jumlah_kavling'
    ];
}
