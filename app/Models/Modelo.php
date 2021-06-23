<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = ['name', 'slug', 'description', 'code', 'status'];

    //Relacion muchos a muchos
    public function catalogpages()
    {
        return $this->belongsToMany(Catalogpage::class);
    }

    //Url amigables
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
