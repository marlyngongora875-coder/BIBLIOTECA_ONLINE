<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donaciones';
    public $timestamps = false;

    public function inventario()
    {
        return $this->hasMany(Inventario::class, 'id_donacion');
    }
}
