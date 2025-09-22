<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $table = 'editorial';
    public $timestamps = false;

    public function libros()
    {
        return $this->hasMany(Libro::class, 'id_editorial');
    }
}

