<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = ['name', 'slug', 'image', 'icon', 'status'];

    //Relacion muchos a muchos
    public function modelos()
    {
        return $this->belongsToMany(Modelo::class);
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
