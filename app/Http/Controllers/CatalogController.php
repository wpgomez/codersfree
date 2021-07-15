<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::where('status', Catalog::PUBLICADO)
                            ->orderBy('id', 'DESC')
                            ->paginate(8);

        $catalogoUrl = env('CATALOGO_URL', '');

        return view('catalogs.index', compact('catalogs', 'catalogoUrl'));
    }
}
