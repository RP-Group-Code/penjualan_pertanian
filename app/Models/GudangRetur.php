<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GudangRetur extends Model
{
    use HasFactory;
    protected $table = "tbgudangretur";

    public function retur()
    {
        return $this->belongsTo(Retur::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

}
