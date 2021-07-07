<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('status', Categoria::PUBLICADO)
                            ->paginate(8);

        return view('categorias.index', compact('categorias'));
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }
}
