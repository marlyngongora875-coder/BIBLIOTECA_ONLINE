<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    public $timestamps = false;

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'usuario_rol', 'id_rol', 'id_usuario');
    }

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class, 'rol_permiso', 'id_rol', 'id_permiso');
    }
}

