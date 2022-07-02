<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    protected $table = 'pelanggan';
    protected $primarykey = 'id';
    protected $fillable = [
        'name', 'alamat'
    ];

    public function pesanan()
    {
        return $this->hasMany('App\Models\order');
    }
}
