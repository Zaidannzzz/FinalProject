<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'pesanan';
    protected $primarykey = 'id';
    protected $fillable = [
        'produk_id', 'pelanggan_id', 'invoice_id', 'qty', 'total_harga', 'status', 'date'
    ];

    public function produk()
    {
        return $this->belongsTo('App\Models\produk');
    }

    public function pelanggan()
    {
        return $this->belongsTo('App\Models\pembeli');
    }
}
