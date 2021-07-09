<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use App\Models\Province;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrder extends Component
{
    public $envio_type = 1;
    public $contact, $phone, $address, $references, $shipping_cost = 0;

    public $countries, $departments = [], $provinces = [], $districts = [];

    public $country_id = "", $department_id = "", $province_id = "", $district_id = "";

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedEnvioType($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'country_id', 'department_id', 'province_id', 
                'district_id', 'address', 'references'
            ]);
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

        $this->districts = District::where('province_id', $value)->get();

        $this->reset('district_id');
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

        $order = new Order();
        
        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + Cart::subtotal();
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
            discount($item);
        }

        Cart::destroy();

        return redirect()->route('orders.payment', $order);
    }

    public function render()
    {
        return view('livewire.create-order')->layout('layouts.store');
    }
}
