<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $fillable = ['leer','escribir','actualizar','eliminar','rol_id','modulo_id'];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}
