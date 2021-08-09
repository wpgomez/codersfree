<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id', 
        'color_id', 
        'talla_id', 
        'stock', 
        'code'
    ];

    //Relacion uno a muchos inversa
    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
    
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class);
    }
}
