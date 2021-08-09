<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelotalla extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id', 
        'talla_id'
    ];

    //Relacion uno a muchos inversa
    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class);
    }
}
