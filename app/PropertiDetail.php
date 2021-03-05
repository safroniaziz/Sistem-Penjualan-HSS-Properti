<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertiDetail extends Model
{
    protected $fillable = [
        'properti_id',
        'no_kavling',
        'harga',
        'panjang',
        'lebar',
        'luas',
        'status'
    ];
}
