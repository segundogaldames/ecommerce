<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = ['nombre','descripcion','portada','status'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
