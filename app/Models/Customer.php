<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "tbcustomer";

    public function gudangd()
    {
        return $this->hasMany(GudangDelivery::class);
    }

}
