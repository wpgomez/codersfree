<?php

namespace App\Http\Livewire;

use App\Models\Momentcontact;
use Livewire\Component;

class FormUnete extends Component
{
    public $momentcontacts = [];

    public function mount()
    {
        $this->momentcontacts = Momentcontact::all();
    }

    public function render()
    {
        return view('livewire.form-unete');
    }
}
