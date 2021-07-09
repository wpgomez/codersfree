<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'cost',
        'department_id', 
        'code_pais', 
        'code_departamento', 
        'code_provincia'
    ];

    //Relacion de uno a muchos
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
