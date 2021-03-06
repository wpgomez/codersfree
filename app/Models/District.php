<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'province_id',
        'code_pais', 
        'code_departamento', 
        'code_provincia',
        'code_distrito'
    ];

    //Relacion de uno a muchos
    /* public function orders()
    {
        return $this->hasMany(Order::class);
    } */
}
