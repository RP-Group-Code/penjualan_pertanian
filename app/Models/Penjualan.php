<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = "tbpenjualan";
    protected $fileable =
    [
        'brggudang_id',

    ];
    public function gudangdelivery()
    {
        return $this->hasMany(GudangDelivery::class);
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }
    public function sales()
    {
        return $this->belongsTo(Salesman::class);
    }

    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function user()
    {
        return $this->belongsTo(Users::class);
    }

}
