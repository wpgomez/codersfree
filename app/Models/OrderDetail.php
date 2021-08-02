<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 
        'rowId', 
        'producto_id', 
        'name', 
        'qty', 
        'price', 
        'weight', 
        'modelo', 
        'modelo_id', 
        'color', 
        'color_id', 
        'image', 
        'talla', 
        'talla_id', 
        'producto_code', 
        'discount', 
        'tax', 
        'subtotal'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    //Relacion uno a muchos inversa
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
