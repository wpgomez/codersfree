<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'code'];

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
