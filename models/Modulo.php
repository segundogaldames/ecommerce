<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'modulos';
    protected $fillable = ['titulo','descripcion','status'];

    public function permisos()
    {
        return $this->hasMany(Permiso::class);
    }
}
