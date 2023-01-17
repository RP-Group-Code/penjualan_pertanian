<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $table = "tbretur";

    public function gudang()
    {
        return $this->belongsTo(Gudang::class);
    }

    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }

}
