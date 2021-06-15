<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'subtitle', 
        'description', 
        'image', 
        'pdf'
    ];

    //Url amigables
    public function getRouteKeyTitle()
    {
        return 'slug';
    }
}
