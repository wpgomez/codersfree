<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = ['name', 'name2', 'slug', 'description', 'code', 'status'];

    //Relacion uno a muchos
    public function modelotallas()
    {
        return $this->hasMany(Modelotalla::class);
    }

    public function modelocolors()
    {
        return $this->hasMany(Modelocolor::class);
    }

    //Relacion muchos a muchos
    public function catalogpages()
    {
        return $this->belongsToMany(Catalogpage::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function tallas()
    {
        return $this->belongsToMany(Talla::class, 'modelotallas');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'modelocolors');
    }

    //Relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, "imageable");
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
