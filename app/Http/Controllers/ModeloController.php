<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    public function index()
    {
        return view('modelos.index');
    }

    public function show(Modelo $modelo)
    {
        return view('modelos.show', compact('modelo'));
    }
}
