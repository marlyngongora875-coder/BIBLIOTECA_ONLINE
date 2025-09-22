<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table = 'genero';
    public $timestamps = false;

    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_genero');
    }
}

