<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $fillable = ['nombre','descripcion','status'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
