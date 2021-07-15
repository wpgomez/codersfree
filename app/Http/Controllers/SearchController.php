<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $name = $request->name;

        $modelos = Modelo::where('name', 'LIKE','%' . $name . '%')
                                ->where('status', Modelo::PUBLICADO)
                                ->paginate(8);

        return view('search', compact('modelos'));
    }
}
