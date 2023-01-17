<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangDelivery extends Model
{
    use HasFactory;
    protected $table = "tbgudangdelivery";
 
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }
    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }
    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

}
