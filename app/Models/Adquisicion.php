<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adquisicion extends Model
{
    protected $table = 'adquisiciones';
    public $timestamps = false;

    public function inventario()
    {
        return $this->hasMany(Inventario::class, 'id_adquisicion');
    }
}

