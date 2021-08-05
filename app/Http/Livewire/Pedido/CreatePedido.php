<?php

namespace App\Http\Livewire\Pedido;

use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Province;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CreatePedido extends Component
{
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

    public function mount()
    {
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
        Cart::instance('pedido');
        $this->subtotal = Cart::subtotal(2,'.','');
        $this->total = Cart::subtotal(2,'.','') + $this->shipping_cost;
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
        $is_not_error_save = false;
        try {
            DB::beginTransaction();

            $order = new Order();
        
            $order->user_id = auth()->user()->id;

            if (count(auth()->user()->clients)>0) {
                $order->client_id = auth()->user()->clients->first()->id;
            }
            
            $order->contact = $this->contact;
            $order->phone = $this->phone;
            $order->envio_type = $this->envio_type;
            $order->shipping_cost = 0;
            $order->total = $this->shipping_cost + Cart::subtotal(2,'.','');
            $order->content = Cart::content();

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

            foreach (Cart::content() as $item) {
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
        }

        if ($is_not_error_save) {
            Cart::destroy();

            return redirect()->route('pedidos.create');
        }
    }

    public function cancel_order()
    {
        return redirect()->route('pedidos.index');
    }

    public function render()
    {
        Cart::instance('pedido');
        $items = Cart::content();
        return view('livewire.pedido.create-pedido', compact('items'))
                ->layout('layouts.store');
    }
}
