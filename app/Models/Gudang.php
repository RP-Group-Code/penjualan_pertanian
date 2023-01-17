<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $table = "tbbrggudang";

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }

    public function gudangd()
    {
        return $this->hasMany(GudangDelivery::class);
    }

}
