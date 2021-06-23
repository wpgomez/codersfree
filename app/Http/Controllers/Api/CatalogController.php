<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CatalogpageResource;
use App\Http\Resources\CatalogResource;
use App\Models\Catalog;
use App\Models\Catalogpage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogs = Catalog::where('status', '=', Catalog::PUBLICADO)
                        ->orderBy('id', 'DESC')->get();
                        
        $data = CatalogResource::collection($catalogs);

        return [
            'items' => $data,
            'mensaje' => ''
        ];
    }

    public function pages($id)
    {
        $catalog = Catalog::find($id);
        if ($catalog) {
            $catalogpages = Catalogpage::where('catalog_id', $catalog->id)
                                    ->orderBy('number_page', 'ASC')
                                    ->get();
            $data = CatalogpageResource::collection($catalogpages);

            $catalog->pdf = Storage::url($catalog->pdf);
        } else {
            $data = [];
            $catalog = new Catalog();
            $catalog->id = $id;
            $catalog->title = '';
            $catalog->pdf = '';
        }
        
        return [
            'items' => $data,
            'mensaje' => '',
            'catalogoId' => $catalog->id,
            'catalogoTitulo' => $catalog->title,
            'catalogoPdf' => $catalog->pdf
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalog = Catalog::where('id', $id)->get();
        $data = CatalogResource::collection($catalog);

        return [
            'items' => $data,
            'mensaje' => ''
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
