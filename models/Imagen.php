<?php
namespace models;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = ['img','producto_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
