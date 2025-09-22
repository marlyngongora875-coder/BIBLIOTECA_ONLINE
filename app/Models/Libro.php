<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'libro';
    public $timestamps = false;

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'id_autor');
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'id_editorial');
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }

    public function inventario()
    {
        return $this->hasMany(Inventario::class, 'id_libro');
    }
}
