<?php

namespace App\Http\Livewire\Pedido;

use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Modelo;
use App\Models\Modelocolor;
use App\Models\Modelotalla;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Producto;
use App\Models\Province;
use App\Models\Talla;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreatePedido extends Component
{
    protected $listeners = ['render'];

    public $order;
    public $envio_type = 1;
    public $contact, $phone, $address, $references, $shipping_cost = 0;

    public $countries, $departments = [], $provinces = [], $districts = [];

    public $country_id = "", $department_id = "", $province_id = "", $district_id = "";

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public $total = 0;
    public $subtotal = 0;

    public $comment = '';
    public $confirmingSearchModelo = false, $confirmingSearchModeloConStock = false;
    public $searchItems, $searchItemsConStock;
    public $search_modelo = '', $search_modeloConStock = '', $search_colorConStock = '';
    public $selectedSearchModelo = [], $selectedSearchModeloConStock = [];

    public $nombre_tallas = ['04','06','08','10','12','14','16','28','30','32','34','36','38','40','42','44','U','XS','S','M','L','XL','XXL'];

    public $columnas = [
        'talla04' => false,
        'talla06' => false,
        'talla08' => false,
        'talla10' => false,
        'talla12' => false,
        'talla14' => false,
        'talla16' => false,
        'talla28' => false,
        'talla30' => false,
        'talla32' => false,
        'talla34' => false,
        'talla36' => false,
        'talla38' => false,
        'talla40' => false,
        'talla42' => false,
        'talla44' => false,
        'tallaU' => false,
        'tallaXS' => false,
        'tallaS' => false,
        'tallaM' => false,
        'tallaL' => false,
        'tallaXL' => false,
        'tallaXXL' => false,
    ];

    public function mount()
    {
        $this->searchItems = [];
        $this->searchItemsConStock = [];
        Cart::instance('pedido');
        $this->countries = Country::all();
        $this->calculateTotal();
    }

    public function updatedEnvioType($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'country_id', 'department_id', 'province_id', 
                'district_id', 'address', 'references'
            ]);
            $this->shipping_cost = 0;
            $this->calculateTotal();
        }
    }

    public function updatedCountryId($value)
    {
        $this->departments = Department::where('country_id', $value)->get();

        $this->reset(['department_id', 'province_id', 'district_id', 'shipping_cost']);
    }

    public function updatedDepartmentId($value)
    {
        $this->provinces = Province::where('department_id', $value)->get();

        $this->reset(['province_id', 'district_id', 'shipping_cost']);
    }

    public function updatedProvinceId($value)
    {
        $province = Province::find($value);

        $this->shipping_cost = $province->cost;
        $this->calculateTotal();

        $this->districts = District::where('province_id', $value)->get();

        $this->reset('district_id');
    }

    public function calculateTotal()
    {
        $this->subtotal = $this->calculoSubTotal();
        $this->total = $this->subtotal + $this->shipping_cost;
    }

    public function create_order()
    {
        $rules = $this->rules;

        if ($this->envio_type == 2) {
            $rules['country_id'] = 'required';
            $rules['department_id'] = 'required';
            $rules['province_id'] = 'required';
            $rules['district_id'] = 'required';
            $rules['address'] = 'required';
            $rules['references'] = 'required';
        }

        $this->validate($rules);
        
        Cart::instance('pedido');
        $content = Cart::content();
                
        Cart::instance('newpedido');
        $is_not_error_save = false;
        try {
            DB::beginTransaction();
            
            foreach ($content as $item) {
                if ($item->options->qty04 > 0) {
                    $this->crearItemNewPedido($item->options->qty04, $item->options->modelo_id, $item->options->color_id, '04', $item->price);
                }
                if ($item->options->qty06 > 0) {
                    $this->crearItemNewPedido($item->options->qty06, $item->options->modelo_id, $item->options->color_id, '06', $item->price);
                }
                if ($item->options->qty08 > 0) {
                    $this->crearItemNewPedido($item->options->qty08, $item->options->modelo_id, $item->options->color_id, '08', $item->price);
                }
                if ($item->options->qty10 > 0) {
                    $this->crearItemNewPedido($item->options->qty10, $item->options->modelo_id, $item->options->color_id, '10', $item->price);
                }
                if ($item->options->qty12 > 0) {
                    $this->crearItemNewPedido($item->options->qty12, $item->options->modelo_id, $item->options->color_id, '12', $item->price);
                }
                if ($item->options->qty14 > 0) {
                    $this->crearItemNewPedido($item->options->qty14, $item->options->modelo_id, $item->options->color_id, '14', $item->price);
                }
                if ($item->options->qty16 > 0) {
                    $this->crearItemNewPedido($item->options->qty16, $item->options->modelo_id, $item->options->color_id, '16', $item->price);
                }
                if ($item->options->qty28 > 0) {
                    $this->crearItemNewPedido($item->options->qty28, $item->options->modelo_id, $item->options->color_id, '28', $item->price);
                }
                if ($item->options->qty30 > 0) {
                    $this->crearItemNewPedido($item->options->qty30, $item->options->modelo_id, $item->options->color_id, '30', $item->price);
                }
                if ($item->options->qty32 > 0) {
                    $this->crearItemNewPedido($item->options->qty32, $item->options->modelo_id, $item->options->color_id, '32', $item->price);
                }
                if ($item->options->qty34 > 0) {
                    $this->crearItemNewPedido($item->options->qty34, $item->options->modelo_id, $item->options->color_id, '34', $item->price);
                }
                if ($item->options->qty36 > 0) {
                    $this->crearItemNewPedido($item->options->qty36, $item->options->modelo_id, $item->options->color_id, '36', $item->price);
                }
                if ($item->options->qty38 > 0) {
                    $this->crearItemNewPedido($item->options->qty38, $item->options->modelo_id, $item->options->color_id, '38', $item->price);
                }
                if ($item->options->qty40 > 0) {
                    $this->crearItemNewPedido($item->options->qty40, $item->options->modelo_id, $item->options->color_id, '40', $item->price);
                }
                if ($item->options->qty42 > 0) {
                    $this->crearItemNewPedido($item->options->qty42, $item->options->modelo_id, $item->options->color_id, '42', $item->price);
                }
                if ($item->options->qty44 > 0) {
                    $this->crearItemNewPedido($item->options->qty44, $item->options->modelo_id, $item->options->color_id, '44', $item->price);
                }
                if ($item->options->qtyU > 0) {
                    $this->crearItemNewPedido($item->options->qtyU, $item->options->modelo_id, $item->options->color_id, 'U', $item->price);
                }
                if ($item->options->qtyXS > 0) {
                    $this->crearItemNewPedido($item->options->qtyXS, $item->options->modelo_id, $item->options->color_id, 'XS', $item->price);
                }
                if ($item->options->qtyS > 0) {
                    $this->crearItemNewPedido($item->options->qtyS, $item->options->modelo_id, $item->options->color_id, 'S', $item->price);
                }
                if ($item->options->qtyM > 0) {
                    $this->crearItemNewPedido($item->options->qtyM, $item->options->modelo_id, $item->options->color_id, 'M', $item->price);
                }
                if ($item->options->qtyL > 0) {
                    $this->crearItemNewPedido($item->options->qtyL, $item->options->modelo_id, $item->options->color_id, 'L', $item->price);
                }
                if ($item->options->qtyXL > 0) {
                    $this->crearItemNewPedido($item->options->qtyXL, $item->options->modelo_id, $item->options->color_id, 'XL', $item->price);
                }
                if ($item->options->qtyXXL > 0) {
                    $this->crearItemNewPedido($item->options->qtyXXL, $item->options->modelo_id, $item->options->color_id, 'XXL', $item->price);
                }
            }

            $newcontent = Cart::content();
                        
            $order = new Order();
        
            $order->type = '2';
            $order->user_id = auth()->user()->id;

            if (count(auth()->user()->clients)>0) {
                $order->client_id = auth()->user()->clients->first()->id;
            }
            
            $order->contact = $this->contact;
            $order->phone = $this->phone;
            $order->envio_type = $this->envio_type;
            $order->shipping_cost = 0;
            $order->total = $this->shipping_cost + $this->subtotal;
            $order->content = $newcontent;
            $order->comment = $this->comment;

            if ($this->envio_type == 2) {
                $order->shipping_cost = $this->shipping_cost;
                $order->country_id = $this->country_id;
                $order->department_id = $this->department_id;
                $order->province_id = $this->province_id;
                $order->district_id = $this->district_id;
                $order->address = $this->address;
                $order->references = $this->references;
            }

            $order->save();

            foreach ($newcontent as $item) {
                $orderdetail = new OrderDetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->rowId = $item->rowId;
                $orderdetail->producto_id = $item->id;
                $orderdetail->name = $item->name;
                $orderdetail->qty = $item->qty;
                $orderdetail->price = $item->price;
                $orderdetail->weight = $item->weight;
                $orderdetail->modelo = $item->options->modelo;
                $orderdetail->modelo_id = $item->options->modelo_id;
                $orderdetail->color = $item->options->color;
                $orderdetail->color_id = $item->options->color_id;
                $orderdetail->image = $item->options->image;
                $orderdetail->talla = $item->options->talla;
                $orderdetail->talla_id = $item->options->talla_id;
                $orderdetail->producto_code = $item->options->producto_code;
                $orderdetail->discount = $item->discount;
                $orderdetail->tax = $item->tax;
                $orderdetail->subtotal = $item->subtotal;

                $orderdetail->save();

                discount($item);
            }

            DB::commit();
            $is_not_error_save = true;
        } catch (\Exception $e) {
            DB::rollBack();
            Cart::instance('newpedido');
            Cart::destroy();
        }

        if ($is_not_error_save) {
            Cart::instance('newpedido');
            Cart::destroy();
            Cart::instance('pedido');
            Cart::destroy();

            return redirect()->route('pedidos.index');
        }
    }

    public function cancel_order()
    {
        Cart::instance('pedido');
        Cart::destroy();

        return redirect()->route('pedidos.index');
    }

    public function confirmSearchModelo()
    {
        $this->searchItems = [];
        $this->selectedSearchModelo = [];
        $this->search_modelo = '';

        $this->searchItemsConStock = [];
        $this->selectedSearchModeloConStock = [];
        $this->search_modeloConStock = '';
        $this->search_colorConStock = '';

        $this->confirmingSearchModelo = true;
        $this->searchModelo();
    }

    public function confirmSearchModeloConStock()
    {
        $this->searchItems = [];
        $this->selectedSearchModelo = [];
        $this->search_modelo = '';

        $this->searchItemsConStock = [];
        $this->selectedSearchModeloConStock = [];
        $this->search_modeloConStock = '';
        $this->search_colorConStock = '';

        $this->confirmingSearchModeloConStock = true;
        $this->searchModeloConStock();
    }

    public function aceptarSearchModelo()
    {
        if ($this->confirmingSearchModelo) {
            if (count($this->selectedSearchModelo)) {
                foreach ($this->selectedSearchModelo as $item) {
                    if (!$this->existeModeloEnLista($item)) {
                        $modelocolor = Modelocolor::find($item);
                        if ($modelocolor) {
                            $price = 0;
                            $name = '';
                            if ($modelocolor->modelo) {
                                $price = $modelocolor->modelo->price;
                                $name = $modelocolor->modelo->name;
                            }
                            if ($modelocolor->color) {
                                $name .= ' - ' . $modelocolor->color->name;
                            }
                            $columnas = [
                                'talla04' => false,
                                'talla06' => false,
                                'talla08' => false,
                                'talla10' => false,
                                'talla12' => false,
                                'talla14' => false,
                                'talla16' => false,
                                'talla28' => false,
                                'talla30' => false,
                                'talla32' => false,
                                'talla34' => false,
                                'talla36' => false,
                                'talla38' => false,
                                'talla40' => false,
                                'talla42' => false,
                                'talla44' => false,
                                'tallaU' => false,
                                'tallaXS' => false,
                                'tallaS' => false,
                                'tallaM' => false,
                                'tallaL' => false,
                                'tallaXL' => false,
                                'tallaXXL' => false,
                            ];
                            
                            $modelotallas = Modelotalla::where('modelo_id', '=', $modelocolor->modelo_id)->get();
                            foreach ($modelotallas as $modelotalla) {
                                foreach ($this->nombre_tallas as $item2) {
                                    if ($modelotalla->talla->code == $item2) {
                                        $columnas['talla' . $item2] = true;
                                        $this->columnas['talla' . $item2] = true;
                                    }
                                }
                            }
                            $options = [
                                'modelo_id' => $modelocolor->modelo_id,
                                'color_id' => $modelocolor->color_id,
                                'talla04' => $columnas['talla04'],
                                'talla06' => $columnas['talla06'],
                                'talla08' => $columnas['talla08'],
                                'talla10' => $columnas['talla10'],
                                'talla12' => $columnas['talla12'],
                                'talla14' => $columnas['talla14'],
                                'talla16' => $columnas['talla16'],
                                'talla28' => $columnas['talla28'],
                                'talla30' => $columnas['talla30'],
                                'talla32' => $columnas['talla32'],
                                'talla34' => $columnas['talla34'],
                                'talla36' => $columnas['talla36'],
                                'talla38' => $columnas['talla38'],
                                'talla40' => $columnas['talla40'],
                                'talla42' => $columnas['talla42'],
                                'talla44' => $columnas['talla44'],
                                'tallaU' => $columnas['tallaU'],
                                'tallaXS' => $columnas['tallaXS'],
                                'tallaS' => $columnas['tallaS'],
                                'tallaM' => $columnas['tallaM'],
                                'tallaL' => $columnas['tallaL'],
                                'tallaXL' => $columnas['tallaXL'],
                                'tallaXXL' => $columnas['tallaXXL'],
                                'qty04' => 0,
                                'qty06' => 0,
                                'qty08' => 0,
                                'qty10' => 0,
                                'qty12' => 0,
                                'qty14' => 0,
                                'qty16' => 0,
                                'qty28' => 0,
                                'qty30' => 0,
                                'qty32' => 0,
                                'qty34' => 0,
                                'qty36' => 0,
                                'qty38' => 0,
                                'qty40' => 0,
                                'qty42' => 0,
                                'qty44' => 0,
                                'qtyU' => 0,
                                'qtyXS' => 0,
                                'qtyS' => 0,
                                'qtyM' => 0,
                                'qtyL' => 0,
                                'qtyXL' => 0,
                                'qtyXXL' => 0,
                                'qtyTotal' => 0,
                            ];

                            Cart::instance('pedido');
                            Cart::add([
                                    'id' => $item, 
                                    'name' => $name, 
                                    'qty' => 1, 
                                    'price' => $price, 
                                    'weight' => 0,
                                    'options' => $options
                                ]);
                        }
                    }
                }
                $this->render();
            }
        }

        $this->confirmingSearchModelo = false;
        $this->searchItems = [];
        $this->selectedSearchModelo = [];
        $this->search_modelo = '';
    }

    public function cancelSearchModelo()
    {
        $this->confirmingSearchModelo = false;
        $this->searchItems = [];
        $this->selectedSearchModelo = [];
        $this->search_modelo = '';
    }

    public function aceptarSearchModeloConStock()
    {
        if ($this->confirmingSearchModeloConStock) {
            if (count($this->selectedSearchModeloConStock)) {
                foreach ($this->selectedSearchModeloConStock as $item) {
                    $producto = Producto::find($item);
                    if ($producto) {
                        if (!$this->existeProductoEnLista($producto)) {
                            if (!$this->existeModeloColorEnLista($producto->modelo_id, $producto->color_id)) {
                                $modelocolor = Modelocolor::where('modelo_id', '=', $producto->modelo_id)
                                                        ->where('color_id', '=', $producto->color_id)
                                                        ->first();
                                if ($modelocolor) {
                                    $price = 0;
                                    $name = '';
                                    if ($modelocolor->modelo) {
                                        $price = $modelocolor->modelo->price;
                                        $name = $modelocolor->modelo->name;
                                    }
                                    if ($modelocolor->color) {
                                        $name .= ' - ' . $modelocolor->color->name;
                                    }
                                    $columnas = [
                                        'talla04' => false,
                                        'talla06' => false,
                                        'talla08' => false,
                                        'talla10' => false,
                                        'talla12' => false,
                                        'talla14' => false,
                                        'talla16' => false,
                                        'talla28' => false,
                                        'talla30' => false,
                                        'talla32' => false,
                                        'talla34' => false,
                                        'talla36' => false,
                                        'talla38' => false,
                                        'talla40' => false,
                                        'talla42' => false,
                                        'talla44' => false,
                                        'tallaU' => false,
                                        'tallaXS' => false,
                                        'tallaS' => false,
                                        'tallaM' => false,
                                        'tallaL' => false,
                                        'tallaXL' => false,
                                        'tallaXXL' => false,
                                    ];
                                    
                                    $modelotallas = Modelotalla::where('modelo_id', '=', $modelocolor->modelo_id)->get();
                                    foreach ($modelotallas as $modelotalla) {
                                        foreach ($this->nombre_tallas as $item2) {
                                            if ($modelotalla->talla->code == $item2) {
                                                $columnas['talla' . $item2] = true;
                                                $this->columnas['talla' . $item2] = true;
                                            }
                                        }
                                    }

                                    $talla_code = $producto->talla->code;
                                    $qtyTotal = 0;
                                    $qty04 = 0;
                                    if ($talla_code == '04') {
                                        $qty04 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty06 = 0;
                                    if ($talla_code == '06') {
                                        $qty06 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty08 = 0;
                                    if ($talla_code == '08') {
                                        $qty08 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty10 = 0;
                                    if ($talla_code == '10') {
                                        $qty10 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty12 = 0;
                                    if ($talla_code == '12') {
                                        $qty12 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty14 = 0;
                                    if ($talla_code == '14') {
                                        $qty14 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty16 = 0;
                                    if ($talla_code == '16') {
                                        $qty16 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty28 = 0;
                                    if ($talla_code == '28') {
                                        $qty28 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty30 = 0;
                                    if ($talla_code == '30') {
                                        $qty30 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty32 = 0;
                                    if ($talla_code == '32') {
                                        $qty32 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty34 = 0;
                                    if ($talla_code == '34') {
                                        $qty34 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty36 = 0;
                                    if ($talla_code == '36') {
                                        $qty36 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty38 = 0;
                                    if ($talla_code == '38') {
                                        $qty38 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty40 = 0;
                                    if ($talla_code == '40') {
                                        $qty40 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty42 = 0;
                                    if ($talla_code == '42') {
                                        $qty42 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qty44 = 0;
                                    if ($talla_code == '44') {
                                        $qty44 = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyU = 0;
                                    if ($talla_code == 'U') {
                                        $qtyU = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyXS = 0;
                                    if ($talla_code == 'XS') {
                                        $qtyXS = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyS = 0;
                                    if ($talla_code == 'S') {
                                        $qtyS = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyM = 0;
                                    if ($talla_code == 'M') {
                                        $qtyM = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyL = 0;
                                    if ($talla_code == 'L') {
                                        $qtyL = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyXL = 0;
                                    if ($talla_code == 'XL') {
                                        $qtyXL = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }
                                    $qtyXXL = 0;
                                    if ($talla_code == 'XXL') {
                                        $qtyXXL = 1;
                                        $qtyTotal = $qtyTotal + 1;
                                    }

                                    $options = [
                                        'modelo_id' => $modelocolor->modelo_id,
                                        'color_id' => $modelocolor->color_id,
                                        'talla04' => $columnas['talla04'],
                                        'talla06' => $columnas['talla06'],
                                        'talla08' => $columnas['talla08'],
                                        'talla10' => $columnas['talla10'],
                                        'talla12' => $columnas['talla12'],
                                        'talla14' => $columnas['talla14'],
                                        'talla16' => $columnas['talla16'],
                                        'talla28' => $columnas['talla28'],
                                        'talla30' => $columnas['talla30'],
                                        'talla32' => $columnas['talla32'],
                                        'talla34' => $columnas['talla34'],
                                        'talla36' => $columnas['talla36'],
                                        'talla38' => $columnas['talla38'],
                                        'talla40' => $columnas['talla40'],
                                        'talla42' => $columnas['talla42'],
                                        'talla44' => $columnas['talla44'],
                                        'tallaU' => $columnas['tallaU'],
                                        'tallaXS' => $columnas['tallaXS'],
                                        'tallaS' => $columnas['tallaS'],
                                        'tallaM' => $columnas['tallaM'],
                                        'tallaL' => $columnas['tallaL'],
                                        'tallaXL' => $columnas['tallaXL'],
                                        'tallaXXL' => $columnas['tallaXXL'],
                                        'qty04' => $qty04,
                                        'qty06' => $qty06,
                                        'qty08' => $qty08,
                                        'qty10' => $qty10,
                                        'qty12' => $qty12,
                                        'qty14' => $qty14,
                                        'qty16' => $qty16,
                                        'qty28' => $qty28,
                                        'qty30' => $qty30,
                                        'qty32' => $qty32,
                                        'qty34' => $qty34,
                                        'qty36' => $qty36,
                                        'qty38' => $qty38,
                                        'qty40' => $qty40,
                                        'qty42' => $qty42,
                                        'qty44' => $qty44,
                                        'qtyU' => $qtyU,
                                        'qtyXS' => $qtyXS,
                                        'qtyS' => $qtyS,
                                        'qtyM' => $qtyM,
                                        'qtyL' => $qtyL,
                                        'qtyXL' => $qtyXL,
                                        'qtyXXL' => $qtyXXL,
                                        'qtyTotal' => $qtyTotal,
                                    ];
                                    
                                    Cart::instance('pedido');
                                    Cart::add([
                                            'id' => $modelocolor->id, 
                                            'name' => $name, 
                                            'qty' => 1, 
                                            'price' => $price, 
                                            'weight' => 0,
                                            'options' => $options
                                        ]);
                                }
                            } else {
                                $modelocolor = Modelocolor::where('modelo_id', '=', $producto->modelo_id)
                                                ->where('color_id', '=', $producto->color_id)
                                                ->first();
                                if ($modelocolor) {
                                    $rowId = $this->rowIdInCart($modelocolor->id);
                                    if ($rowId) {
                                        $cart = Cart::get($rowId);
                                        if ($cart) {
                                            $talla_code = $producto->talla->code;
                                            $qtyTotal = $cart->options->qtyTotal;
                                            $qty04 = $cart->options->qty04;
                                            if ($talla_code == '04') {
                                                $qty04 = $qty04 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty06 = $cart->options->qty06;
                                            if ($talla_code == '06') {
                                                $qty06 = $qty06 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty08 = $cart->options->qty08;
                                            if ($talla_code == '08') {
                                                $qty08 = $qty08 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty10 = $cart->options->qty10;
                                            if ($talla_code == '10') {
                                                $qty10 = $qty10 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty12 = $cart->options->qty12;
                                            if ($talla_code == '12') {
                                                $qty12 = $qty12 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty14 = $cart->options->qty14;
                                            if ($talla_code == '14') {
                                                $qty14 = $qty14 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty16 = $cart->options->qty16;
                                            if ($talla_code == '16') {
                                                $qty16 = $qty16 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty28 = $cart->options->qty28;
                                            if ($talla_code == '28') {
                                                $qty28 = $qty28 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty30 = $cart->options->qty30;
                                            if ($talla_code == '30') {
                                                $qty30 = $qty30 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty32 = $cart->options->qty32;
                                            if ($talla_code == '32') {
                                                $qty32 = $qty32 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty34 = $cart->options->qty34;
                                            if ($talla_code == '34') {
                                                $qty34 = $qty34 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty36 = $cart->options->qty36;
                                            if ($talla_code == '36') {
                                                $qty36 = $qty36 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty38 = $cart->options->qty38;
                                            if ($talla_code == '38') {
                                                $qty38 = $qty38 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty40 = $cart->options->qty40;
                                            if ($talla_code == '40') {
                                                $qty40 = $qty40 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty42 = $cart->options->qty42;
                                            if ($talla_code == '42') {
                                                $qty42 = $qty42 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qty44 = $cart->options->qty44;
                                            if ($talla_code == '44') {
                                                $qty44 = $qty44 + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyU = $cart->options->qtyU;
                                            if ($talla_code == 'U') {
                                                $qtyU = $qtyU + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyXS = $cart->options->qtyXS;
                                            if ($talla_code == 'XS') {
                                                $qtyXS = $qtyXS + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyS = $cart->options->qtyS;
                                            if ($talla_code == 'S') {
                                                $qtyS = $qtyS + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyM = $cart->options->qtyM;
                                            if ($talla_code == 'M') {
                                                $qtyM = $qtyM + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyL = $cart->options->qtyL;
                                            if ($talla_code == 'L') {
                                                $qtyL = $qtyL + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyXL = $cart->options->qtyXL;
                                            if ($talla_code == 'XL') {
                                                $qtyXL = $qtyXL + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }
                                            $qtyXXL = $cart->options->qtyXXL;
                                            if ($talla_code == 'XXL') {
                                                $qtyXXL = $qtyXXL + 1;
                                                $qtyTotal = $qtyTotal + 1;
                                            }

                                            $options = [
                                                'modelo_id' => $modelocolor->modelo_id,
                                                'color_id' => $modelocolor->color_id,
                                                'talla04' => $cart->options->talla04,
                                                'talla06' => $cart->options->talla06,
                                                'talla08' => $cart->options->talla08,
                                                'talla10' => $cart->options->talla10,
                                                'talla12' => $cart->options->talla12,
                                                'talla14' => $cart->options->talla14,
                                                'talla16' => $cart->options->talla16,
                                                'talla28' => $cart->options->talla28,
                                                'talla30' => $cart->options->talla30,
                                                'talla32' => $cart->options->talla32,
                                                'talla34' => $cart->options->talla34,
                                                'talla36' => $cart->options->talla36,
                                                'talla38' => $cart->options->talla38,
                                                'talla40' => $cart->options->talla40,
                                                'talla42' => $cart->options->talla42,
                                                'talla44' => $cart->options->talla44,
                                                'tallaU' => $cart->options->tallaU,
                                                'tallaXS' => $cart->options->tallaXS,
                                                'tallaS' => $cart->options->tallaS,
                                                'tallaM' => $cart->options->tallaM,
                                                'tallaL' => $cart->options->tallaL,
                                                'tallaXL' => $cart->options->tallaXL,
                                                'tallaXXL' => $cart->options->tallaXXL,
                                                'qty04' => $qty04,
                                                'qty06' => $qty06,
                                                'qty08' => $qty08,
                                                'qty10' => $qty10,
                                                'qty12' => $qty12,
                                                'qty14' => $qty14,
                                                'qty16' => $qty16,
                                                'qty28' => $qty28,
                                                'qty30' => $qty30,
                                                'qty32' => $qty32,
                                                'qty34' => $qty34,
                                                'qty36' => $qty36,
                                                'qty38' => $qty38,
                                                'qty40' => $qty40,
                                                'qty42' => $qty42,
                                                'qty44' => $qty44,
                                                'qtyU' => $qtyU,
                                                'qtyXS' => $qtyXS,
                                                'qtyS' => $qtyS,
                                                'qtyM' => $qtyM,
                                                'qtyL' => $qtyL,
                                                'qtyXL' => $qtyXL,
                                                'qtyXXL' => $qtyXXL,
                                                'qtyTotal' => $qtyTotal,
                                            ];
                
                                            Cart::instance('pedido');
                                            Cart::update($cart->rowId, 
                                                [
                                                    'options' => $options
                                                ]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                $this->render();
            }
        }

        $this->confirmingSearchModeloConStock = false;
        $this->searchItemsConStock = [];
        $this->selectedSearchModeloConStock = [];
        $this->search_modeloConStock = '';
        $this->search_colorConStock = '';
    }

    public function cancelSearchModeloConStock()
    {
        $this->confirmingSearchModeloConStock = false;
        $this->searchItemsConStock = [];
        $this->selectedSearchModeloConStock = [];
        $this->search_modeloConStock = '';
        $this->search_colorConStock = '';
    }

    public function delete_item($rowId)
    {
        Cart::instance('pedido');
        Cart::remove($rowId);

        $this->render();
    }

    public function searchModelo()
    {
        if ($this->confirmingSearchModelo) {
            $this->searchItems = DB::table('modelocolors')
                                ->join('modelos', function ($join) {
                                    $join->on('modelos.id', '=', 'modelocolors.modelo_id')
                                        ->where('modelos.status', '=', Modelo::PUBLICADO);
                                })
                                ->join('colors', 'colors.id', '=', 'modelocolors.color_id')
                                ->select('modelocolors.*', 'modelos.name as modelo_name', 'colors.name as color_name', 'modelos.price')
                                ->where('modelos.name', 'like', '%' . $this->search_modelo . '%')
                                ->orderBy('modelos.name')
                                ->orderBy('colors.name')
                                ->take(20)->get();
        }
    }

    public function searchModeloConStock()
    {
        if ($this->confirmingSearchModeloConStock) {
            $this->searchItemsConStock = DB::table('productos')
                                ->join('modelocolors', function ($join) {
                                    $join->on('modelocolors.modelo_id', '=', 'productos.modelo_id')
                                        ->on('modelocolors.color_id', '=', 'productos.color_id');
                                })
                                ->join('modelos', function ($join) {
                                    $join->on('modelos.id', '=', 'productos.modelo_id')
                                        ->where('modelos.status', '=', Modelo::PUBLICADO);
                                })
                                ->join('colors', 'colors.id', '=', 'productos.color_id')
                                ->join('tallas', 'tallas.id', '=', 'productos.talla_id')
                                ->select('productos.*', 'modelos.name as modelo_name', 'colors.name as color_name', 'tallas.name as talla_name','modelos.price')
                                ->where('modelos.name', 'like', '%' . $this->search_modeloConStock . '%')
                                ->where('colors.name', 'like', '%' . $this->search_colorConStock . '%')
                                ->where('productos.stock', '>', 0)
                                ->orderBy('modelos.name')
                                ->orderBy('colors.name')
                                ->orderBy('tallas.orden')
                                ->take(20)->get();
        }
    }

    public function updatedSearchModelo()
    {
        $this->searchModelo();
    }

    public function updatedSearchModeloConStock()
    {
        $this->searchModeloConStock();
    }

    public function updatedSearchColorConStock()
    {
        $this->searchModeloConStock();
    }

    public function existeModeloEnLista($id)
    {
        Cart::instance('pedido');
        $items = Cart::content();
        foreach ($items as $item) {
            if ($item->id == $id) {
                return true;
            }
        }

        return false;
    }

    public function existeModeloColorEnLista($modelo_id, $color_id)
    {
        Cart::instance('pedido');
        $items = Cart::content();
        foreach ($items as $item) {
            if ($item->options->modelo_id == $modelo_id && $item->options->color_id == $color_id) {
                return true;
            }
        }

        return false;
    }

    public function existeProductoEnLista($producto)
    {
        Cart::instance('pedido');
        $items = Cart::content();
        foreach ($items as $item) {
            if ($item->options->modelo_id == $producto->modelo_id && $item->options->color_id == $producto->color_id) {
                if ($producto->talla->code == '04' && $item->options->qty04 > 0) {
                    return true;
                }
                if ($producto->talla->code == '06' && $item->options->qty06 > 0) {
                    return true;
                }
                if ($producto->talla->code == '08' && $item->options->qty08 > 0) {
                    return true;
                }
                if ($producto->talla->code == '10' && $item->options->qty10 > 0) {
                    return true;
                }
                if ($producto->talla->code == '12' && $item->options->qty12 > 0) {
                    return true;
                }
                if ($producto->talla->code == '14' && $item->options->qty14 > 0) {
                    return true;
                }
                if ($producto->talla->code == '16' && $item->options->qty16 > 0) {
                    return true;
                }
                if ($producto->talla->code == '28' && $item->options->qty28 > 0) {
                    return true;
                }
                if ($producto->talla->code == '30' && $item->options->qty30 > 0) {
                    return true;
                }
                if ($producto->talla->code == '32' && $item->options->qty32 > 0) {
                    return true;
                }
                if ($producto->talla->code == '34' && $item->options->qty34 > 0) {
                    return true;
                }
                if ($producto->talla->code == '36' && $item->options->qty36 > 0) {
                    return true;
                }
                if ($producto->talla->code == '38' && $item->options->qty38 > 0) {
                    return true;
                }
                if ($producto->talla->code == '40' && $item->options->qty40 > 0) {
                    return true;
                }
                if ($producto->talla->code == '42' && $item->options->qty42 > 0) {
                    return true;
                }
                if ($producto->talla->code == '44' && $item->options->qty44 > 0) {
                    return true;
                }
                if ($producto->talla->code == 'U' && $item->options->qtyU > 0) {
                    return true;
                }
                if ($producto->talla->code == 'XS' && $item->options->qtyXS > 0) {
                    return true;
                }
                if ($producto->talla->code == 'S' && $item->options->qtyS > 0) {
                    return true;
                }
                if ($producto->talla->code == 'M' && $item->options->qtyM > 0) {
                    return true;
                }
                if ($producto->talla->code == 'L' && $item->options->qtyL > 0) {
                    return true;
                }
                if ($producto->talla->code == 'XL' && $item->options->qtyXL > 0) {
                    return true;
                }
                if ($producto->talla->code == 'XXL' && $item->options->qtyXXL > 0) {
                    return true;
                }
            }
        }

        return false;
    }

    public function calculoSubTotal()
    {
        $result = 0;
        Cart::instance('pedido');
        foreach (Cart::content() as $item) {
            $result = $result + $item->options->qtyTotal * $item->price;
        }
        return $result;
    }

    public function decrement($rowId, $talla)
    {
        Cart::instance('pedido');
        $cart = Cart::content()->where('rowId',$rowId);
        if($cart->isNotEmpty()){
            $item = Cart::get($rowId);
            if ($talla == '04') {
                $item->options->qty04 = $item->options->qty04 - 1;
            }
            if ($talla == '06') {
                $item->options->qty06 = $item->options->qty06 - 1;
            }
            if ($talla == '08') {
                $item->options->qty08 = $item->options->qty08 - 1;
            }
            if ($talla == '10') {
                $item->options->qty10 = $item->options->qty10 - 1;
            }
            if ($talla == '12') {
                $item->options->qty12 = $item->options->qty12 - 1;
            }
            if ($talla == '14') {
                $item->options->qty14 = $item->options->qty14 - 1;
            }
            if ($talla == '16') {
                $item->options->qty16 = $item->options->qty16 - 1;
            }
            if ($talla == '28') {
                $item->options->qty28 = $item->options->qty28 - 1;
            }
            if ($talla == '30') {
                $item->options->qty30 = $item->options->qty30 - 1;
            }
            if ($talla == '32') {
                $item->options->qty32 = $item->options->qty32 - 1;
            }
            if ($talla == '34') {
                $item->options->qty34 = $item->options->qty34 - 1;
            }
            if ($talla == '36') {
                $item->options->qty36 = $item->options->qty36 - 1;
            }
            if ($talla == '38') {
                $item->options->qty38 = $item->options->qty38 - 1;
            }
            if ($talla == '40') {
                $item->options->qty40 = $item->options->qty40 - 1;
            }
            if ($talla == '42') {
                $item->options->qty42 = $item->options->qty42 - 1;
            }
            if ($talla == '44') {
                $item->options->qty44 = $item->options->qty44 - 1;
            }
            if ($talla == 'U') {
                $item->options->qtyU = $item->options->qtyU - 1;
            }
            if ($talla == 'XS') {
                $item->options->qtyXS = $item->options->qtyXS - 1;
            }
            if ($talla == 'S') {
                $item->options->qtyS = $item->options->qtyS - 1;
            }
            if ($talla == 'M') {
                $item->options->qtyM = $item->options->qtyM - 1;
            }
            if ($talla == 'L') {
                $item->options->qtyL = $item->options->qtyL - 1;
            }
            if ($talla == 'XL') {
                $item->options->qtyXL = $item->options->qtyXL - 1;
            }
            if ($talla == 'XXL') {
                $item->options->qtyXXL = $item->options->qtyXXL - 1;
            }
    
            $error = false;
            if ($item->options->qty04 < 0) {
                $error = true;
            }
            if ($item->options->qty06 < 0) {
                $error = true;
            }
            if ($item->options->qty08 < 0) {
                $error = true;
            }
            if ($item->options->qty10 < 0) {
                $error = true;
            }
            if ($item->options->qty12 < 0) {
                $error = true;
            }
            if ($item->options->qty14 < 0) {
                $error = true;
            }
            if ($item->options->qty16 < 0) {
                $error = true;
            }
            if ($item->options->qty28 < 0) {
                $error = true;
            }
            if ($item->options->qty30 < 0) {
                $error = true;
            }
            if ($item->options->qty32 < 0) {
                $error = true;
            }
            if ($item->options->qty34 < 0) {
                $error = true;
            }
            if ($item->options->qty36 < 0) {
                $error = true;
            }
            if ($item->options->qty38 < 0) {
                $error = true;
            }
            if ($item->options->qty40 < 0) {
                $error = true;
            }
            if ($item->options->qty42 < 0) {
                $error = true;
            }
            if ($item->options->qty44 < 0) {
                $error = true;
            }
            if ($item->options->qtyU < 0) {
                $error = true;
            }
            if ($item->options->qtyXS < 0) {
                $error = true;
            }
            if ($item->options->qtyS < 0) {
                $error = true;
            }
            if ($item->options->qtyM < 0) {
                $error = true;
            }
            if ($item->options->qtyL < 0) {
                $error = true;
            }
            if ($item->options->qtyXL < 0) {
                $error = true;
            }
            if ($item->options->qtyXXL < 0) {
                $error = true;
            }
            
            if (!$error) {
                $this->updateCart($item);
            }
        }
    }

    public function increment($rowId, $talla)
    {
        Cart::instance('pedido');
        $cart = Cart::content()->where('rowId',$rowId);
        if($cart->isNotEmpty()){
            $item = Cart::get($rowId);
            if ($talla == '04') {
                $item->options->qty04 = $item->options->qty04 + 1;
            }
            if ($talla == '06') {
                $item->options->qty06 = $item->options->qty06 + 1;
            }
            if ($talla == '08') {
                $item->options->qty08 = $item->options->qty08 + 1;
            }
            if ($talla == '10') {
                $item->options->qty10 = $item->options->qty10 + 1;
            }
            if ($talla == '12') {
                $item->options->qty12 = $item->options->qty12 + 1;
            }
            if ($talla == '14') {
                $item->options->qty14 = $item->options->qty14 + 1;
            }
            if ($talla == '16') {
                $item->options->qty16 = $item->options->qty16 + 1;
            }
            if ($talla == '28') {
                $item->options->qty28 = $item->options->qty28 + 1;
            }
            if ($talla == '30') {
                $item->options->qty30 = $item->options->qty30 + 1;
            }
            if ($talla == '32') {
                $item->options->qty32 = $item->options->qty32 + 1;
            }
            if ($talla == '34') {
                $item->options->qty34 = $item->options->qty34 + 1;
            }
            if ($talla == '36') {
                $item->options->qty36 = $item->options->qty36 + 1;
            }
            if ($talla == '38') {
                $item->options->qty38 = $item->options->qty38 + 1;
            }
            if ($talla == '40') {
                $item->options->qty40 = $item->options->qty40 + 1;
            }
            if ($talla == '42') {
                $item->options->qty42 = $item->options->qty42 + 1;
            }
            if ($talla == '44') {
                $item->options->qty44 = $item->options->qty44 + 1;
            }
            if ($talla == 'U') {
                $item->options->qtyU = $item->options->qtyU + 1;
            }
            if ($talla == 'XS') {
                $item->options->qtyXS = $item->options->qtyXS + 1;
            }
            if ($talla == 'S') {
                $item->options->qtyS = $item->options->qtyS + 1;
            }
            if ($talla == 'M') {
                $item->options->qtyM = $item->options->qtyM + 1;
            }
            if ($talla == 'L') {
                $item->options->qtyL = $item->options->qtyL + 1;
            }
            if ($talla == 'XL') {
                $item->options->qtyXL = $item->options->qtyXL + 1;
            }
            if ($talla == 'XXL') {
                $item->options->qtyXXL = $item->options->qtyXXL + 1;
            }

            $this->updateCart($item);
        }
    }

    public function updateCart($item)
    {
        $qtyTotal = $this->calculaTotalItem($item);

        Cart::instance('pedido');
        Cart::update($item->rowId, 
            [
                'options' => [
                    'modelo_id' => $item->options->modelo_id,
                    'color_id' => $item->options->color_id,
                    'talla04' => $item->options->talla04,
                    'talla06' => $item->options->talla06,
                    'talla08' => $item->options->talla08,
                    'talla10' => $item->options->talla10,
                    'talla12' => $item->options->talla12,
                    'talla14' => $item->options->talla14,
                    'talla16' => $item->options->talla16,
                    'talla28' => $item->options->talla28,
                    'talla30' => $item->options->talla30,
                    'talla32' => $item->options->talla32,
                    'talla34' => $item->options->talla34,
                    'talla36' => $item->options->talla36,
                    'talla38' => $item->options->talla38,
                    'talla40' => $item->options->talla40,
                    'talla42' => $item->options->talla42,
                    'talla44' => $item->options->talla44,
                    'tallaU' => $item->options->tallaU,
                    'tallaXS' => $item->options->tallaXS,
                    'tallaS' => $item->options->tallaS,
                    'tallaM' => $item->options->tallaM,
                    'tallaL' => $item->options->tallaL,
                    'tallaXL' => $item->options->tallaXL,
                    'tallaXXL' => $item->options->tallaXXL,
                    'qty04' => $item->options->qty04,
                    'qty06' => $item->options->qty06,
                    'qty08' => $item->options->qty08,
                    'qty10' => $item->options->qty10,
                    'qty12' => $item->options->qty12,
                    'qty14' => $item->options->qty14,
                    'qty16' => $item->options->qty16,
                    'qty28' => $item->options->qty28,
                    'qty30' => $item->options->qty30,
                    'qty32' => $item->options->qty32,
                    'qty34' => $item->options->qty34,
                    'qty36' => $item->options->qty36,
                    'qty38' => $item->options->qty38,
                    'qty40' => $item->options->qty40,
                    'qty42' => $item->options->qty42,
                    'qty44' => $item->options->qty44,
                    'qtyU' => $item->options->qtyU,
                    'qtyXS' => $item->options->qtyXS,
                    'qtyS' => $item->options->qtyS,
                    'qtyM' => $item->options->qtyM,
                    'qtyL' => $item->options->qtyL,
                    'qtyXL' => $item->options->qtyXL,
                    'qtyXXL' => $item->options->qtyXXL,
                    'qtyTotal' => $qtyTotal
                ]
            ]);
        
        $this->render();
    }

    public function calculaTotalItem($item)
    {
        $result = $item->options->qty04 + $item->options->qty06 + $item->options->qty08 + $item->options->qty10;
        $result = $result + $item->options->qty12 + $item->options->qty14 + $item->options->qty16 + $item->options->qty28;
        $result = $result + $item->options->qty30 + $item->options->qty32 + $item->options->qty34 + $item->options->qty36;
        $result = $result + $item->options->qty38 + $item->options->qty40 + $item->options->qty42 + $item->options->qty44;
        $result = $result + $item->options->qtyU + $item->options->qtyXS + $item->options->qtyS + $item->options->qtyM;
        $result = $result + $item->options->qtyL + $item->options->qtyXL + $item->options->qtyXXL;

        return $result;
    }

    public function crearItemNewPedido($qty, $modelo_id, $color_id, $talla_code, $price)
    {
        $talla = Talla::where('code', $talla_code)->first();
        if ($talla) {
            $producto = Producto::where('modelo_id', '=', $modelo_id)
                            ->where('color_id', '=', $color_id)
                            ->where('talla_id', '=', $talla->id)
                            ->first();
            if ($producto) {
                $image = '';
                $modelocolor = Modelocolor::where('modelo_id', '=', $producto->modelo_id)
                                    ->where('color_id', '=', $producto->color_id)
                                    ->first();
                if ($modelocolor) {
                    if (count($modelocolor->images)>0) {
                        $image = Storage::url($modelocolor->images->first()->url);
                    }
                }
                
                $producto_id = $producto->id;
                $name = $producto->modelo->name;
                $options = [
                    'modelo' => $producto->modelo->name,
                    'modelo_id' => $producto->modelo_id,
                    'color' => $producto->color->name,
                    'color_id' => $producto->color_id,
                    'talla' => $producto->talla->name,
                    'talla_id' => $producto->talla_id,
                    'producto_code' => $producto->code,
                    'image' => $image
                ];

                Cart::add([
                        'id' => $producto_id, 
                        'name' => $name, 
                        'qty' => $qty, 
                        'price' => $price, 
                        'weight' => 0,
                        'options' => $options
                    ]);
            }
        }
    }

    public function actualizarColumnaTallas()
    {
        $this->columnas = [
            'talla04' => false,
            'talla06' => false,
            'talla08' => false,
            'talla10' => false,
            'talla12' => false,
            'talla14' => false,
            'talla16' => false,
            'talla28' => false,
            'talla30' => false,
            'talla32' => false,
            'talla34' => false,
            'talla36' => false,
            'talla38' => false,
            'talla40' => false,
            'talla42' => false,
            'talla44' => false,
            'tallaU' => false,
            'tallaXS' => false,
            'tallaS' => false,
            'tallaM' => false,
            'tallaL' => false,
            'tallaXL' => false,
            'tallaXXL' => false,
        ];
        Cart::instance('pedido');
        foreach (Cart::content() as $item) {
            if ($item->options->talla04) {
                $this->columnas['talla04'] = true;
            }
            if ($item->options->talla06) {
                $this->columnas['talla06'] = true;
            }
            if ($item->options->talla08) {
                $this->columnas['talla08'] = true;
            }
            if ($item->options->talla10) {
                $this->columnas['talla10'] = true;
            }
            if ($item->options->talla12) {
                $this->columnas['talla12'] = true;
            }
            if ($item->options->talla14) {
                $this->columnas['talla14'] = true;
            }
            if ($item->options->talla16) {
                $this->columnas['talla16'] = true;
            }
            if ($item->options->talla28) {
                $this->columnas['talla28'] = true;
            }
            if ($item->options->talla30) {
                $this->columnas['talla30'] = true;
            }
            if ($item->options->talla32) {
                $this->columnas['talla32'] = true;
            }
            if ($item->options->talla34) {
                $this->columnas['talla34'] = true;
            }
            if ($item->options->talla36) {
                $this->columnas['talla36'] = true;
            }
            if ($item->options->talla38) {
                $this->columnas['talla38'] = true;
            }
            if ($item->options->talla40) {
                $this->columnas['talla40'] = true;
            }
            if ($item->options->talla42) {
                $this->columnas['talla42'] = true;
            }
            if ($item->options->talla44) {
                $this->columnas['talla44'] = true;
            }
            if ($item->options->tallaU) {
                $this->columnas['tallaU'] = true;
            }
            if ($item->options->tallaXS) {
                $this->columnas['tallaXS'] = true;
            }
            if ($item->options->tallaS) {
                $this->columnas['tallaS'] = true;
            }
            if ($item->options->tallaM) {
                $this->columnas['tallaM'] = true;
            }
            if ($item->options->tallaL) {
                $this->columnas['tallaL'] = true;
            }
            if ($item->options->tallaXL) {
                $this->columnas['tallaXL'] = true;
            }
            if ($item->options->tallaXXL) {
                $this->columnas['tallaXXL'] = true;
            }
        }
    }

    public function rowIdInCart($id)
    {
        Cart::instance('pedido');
        $items = Cart::content();
        foreach ($items as $item) {
            if ($item->id == $id) {
                return $item->rowId;
            }
        }

        return '';
    }

    public function render()
    {
        $this->actualizarColumnaTallas();
        $this->calculateTotal();
        Cart::instance('pedido');
        $items = Cart::content();
        return view('livewire.pedido.create-pedido', compact('items'))
                ->layout('layouts.store');
    }
}
