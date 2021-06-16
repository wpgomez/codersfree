<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogpage extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalog_id', 
        'number_page', 
        'image_normal', 
        'image_small'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //Relacion uno a muchos inversa
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
}
