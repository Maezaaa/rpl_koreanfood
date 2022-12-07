<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    public function makanan()
    {
        return $this->belongsTo('App\Makanan','makanan_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\User','pesanan_id', 'id');
    }
}
