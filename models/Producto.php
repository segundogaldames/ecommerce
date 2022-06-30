<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo','nombre','descripcion','precio','stock','status','imagen','categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class);
    }
}
