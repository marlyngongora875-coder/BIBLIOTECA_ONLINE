<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    public $timestamps = false;

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro');
    }

    public function adquisicion()
    {
        return $this->belongsTo(Adquisicion::class, 'id_adquisicion');
    }

    public function donacion()
    {
        return $this->belongsTo(Donacion::class, 'id_donacion');
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'id_inventario');
    }
}

