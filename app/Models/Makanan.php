<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    public function pesanan_detail()
    {
        return $this->hasMany('App\PesananDetaill', 'makanan_id', 'id');
    }
}
