<?php

namespace App\Http\Livewire;

use App\Models\Color;
use App\Models\Modelocolor;
use App\Models\Producto;
use App\Models\Talla;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Symfony\Component\Console\Output\ConsoleOutput;

class AddModeloCartItem extends Component
{
    public $modelo;
    public $producto;
    
    public $qty = 1;
    public $quantity = 0;

    public $talla_id = "";
    public $color_id = "";

    public $tallas = [];
    public $colors = [];
    public $options = [];

    public function mount()
    {
        $this->tallas = $this->modelo->tallas;
        $this->colors = $this->modelo->colors;
        $this->options['modelo'] = $this->modelo->name;
        $this->options['modelo_id'] = $this->modelo->id;
    }

    public function updatedTallaId($value)
    {
        $talla = Talla::find($value);
        if ($talla) {
            $this->options['talla'] = $talla->name;
            $this->options['talla_id'] = $talla->id;
            if ($this->color_id) {
                
                $this->producto = Producto::where('modelo_id', '=', $this->modelo->id)
                                        ->where('color_id', '=', $this->color_id)
                                        ->where('talla_id', '=', $talla->id)
                                        ->first();

                $this->quantity = 0;
                if ($this->producto) {
                    $this->quantity = $this->producto->stock - qty_added($this->producto->id);
                }
            }
        }
    }

    public function updatedColorId($value)
    {
        $color = Color::find($value);
        if ($color) {
            $this->options['color'] = $color->name;
            $this->options['color_id'] = $color->id;

            $modelocolor = Modelocolor::where('modelo_id', '=', $this->modelo->id)
                                    ->where('color_id', '=', $color->id)
                                    ->first();
            if ($modelocolor) {
                if (count($modelocolor->images)>0) {
                    $this->options['image'] = Storage::url($modelocolor->images->first()->url);
                } else {
                    $this->options['image'] = '';
                }
            }
            
            if ($this->talla_id) {
                $this->producto = Producto::where('modelo_id', '=', $this->modelo->id)
                                        ->where('color_id', '=', $color->id)
                                        ->where('talla_id', '=', $this->talla_id)
                                        ->first();

                $this->quantity = 0;
                if ($this->producto) {
                    $this->quantity = $this->producto->stock - qty_added($this->producto->id);
                }
            }
        }
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }
   
    public function addItem()
    {
        if ($this->producto) {
            Cart::add([
                    'id' => $this->producto->id, 
                    'name' => $this->modelo->name, 
                    'qty' => $this->qty, 
                    'price' => $this->modelo->price, 
                    'weight' => 0,
                    'options' => $this->options
                ]);
            
            $this->quantity = qty_available($this->producto->id);

            $this->reset('qty');
            
            $this->emitTo('dropdown-cart', 'render');
        }
    }

    public function render()
    {
        return view('livewire.add-modelo-cart-item');
    }
}
