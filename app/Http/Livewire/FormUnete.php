<?php

namespace App\Http\Livewire;

use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Momentcontact;
use App\Models\Province;
use Livewire\Component;
use Monolog\Handler\IFTTTHandler;

class FormUnete extends Component
{
    public $momentcontacts = [];

    public $countries = [];

    public $departments = [], $provinces = [], $districts = [];

    public $country_id = "", $department_id = "";
    
    public $province_id = "", $district_id = "";

    public $nombres = "", $apellidos = "", $telefono = "";

    public $correo = "", $direccion = "", $momentcontact_id = "";

    public function mount()
    {
        $this->momentcontacts = Momentcontact::all();
        $this->countries = Country::all();

        $this->momentcontact_id = "";
    }

    public function updatedCountryId($value)
    {
        $this->departments = Department::where('country_id', $value)->get();

        $this->reset(['department_id', 'province_id', 'district_id']);
    }

    public function updatedDepartmentId($value)
    {
        $this->provinces = Province::where('department_id', $value)->get();

        $this->reset(['province_id', 'district_id']);
    }

    public function updatedProvinceId($value)
    {
        $this->districts = District::where('province_id', $value)->get();

        $this->reset(['district_id']);
    }

    public function render()
    {
        if (!$this->nombres) {
            $this->nombres = old('nombres');
        }
        if (!$this->apellidos) {
            $this->apellidos = old('apellidos');
        }
        if (!$this->telefono) {
            $this->telefono = old('telefono');
        }
        if (!$this->correo) {
            $this->correo = old('correo');
        }
        if (!$this->direccion) {
            $this->direccion = old('direccion');
        }
        if (!$this->country_id) {
            if (old('country_id')) {
                $this->country_id = old('country_id');
                $this->updatedCountryId($this->country_id);
            }
        }
        if (!$this->department_id) {
            if (old('department_id')) {
                $this->department_id = old('department_id');
                $this->updatedDepartmentId($this->department_id);
            }
        }
        if (!$this->province_id) {
            if (old('province_id')) {
                $this->province_id = old('province_id');
                $this->updatedProvinceId($this->province_id);
            }
        }
        if (!$this->district_id) {
            $this->district_id = old('district_id');
        }
        if (!$this->momentcontact_id) {
            $this->momentcontact_id = old('momentcontact_id');
        }
        
        return view('livewire.form-unete');
    }
}
