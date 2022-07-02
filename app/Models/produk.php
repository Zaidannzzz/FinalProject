<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';
    protected $primarykey = 'id';
    protected $fillable = [
        'kategori_id', 'nama_produk', 'deskripsi', 'harga', 'status', 'berat', 'foto_produk'
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Models\kategori');
    }

    public function pesanan()
    {
        return $this->hasMany('App\Models\order');
    }
}
