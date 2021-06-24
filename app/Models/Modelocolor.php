<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelocolor extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id', 
        'color_id'
    ];

    //Relacion uno a muchos inversa
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    //Relacion uno a muchos polimorfica
    public function images()
    {
        return $this->morphMany(Image::class, "imageable");
    }
}
