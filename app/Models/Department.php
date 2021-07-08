<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id', 'code_pais', 'code_departamento'];

    //Relacion de uno a muchos
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

    /* public function orders()
    {
        return $this->hasMany(Order::class);
    } */
}
