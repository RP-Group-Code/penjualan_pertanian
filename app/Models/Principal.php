<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    use HasFactory;
    protected $table = "tbprincipal";

    public function gudangdelivery()
    {
        return $this->hasMany(GudangDelivery::class);
    }
}
