<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const PUBLICADO = 2;

    protected $fillable = [
        'title', 
        'slug', 
        'subtitle', 
        'description', 
        'image', 
        'pdf',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //Relacion uno a muchos
    public function catalogpage()
    {
        return $this->hasMany(Catalogpage::class);
    }

    //Url amigables
    public function getRouteKeyTitle()
    {
        return 'slug';
    }
}
