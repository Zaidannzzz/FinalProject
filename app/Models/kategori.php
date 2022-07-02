<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primarykey = 'id';
    protected $fillable = [
        'jenis_kategori', 'nama_kategori'
    ];

    public function produk()
    {
        return $this->hasMany('App\Models\produk');
    }
}
