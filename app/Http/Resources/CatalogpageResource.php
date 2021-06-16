<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class CatalogpageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'catalogo_id' => $this->catalog_id,
            'nro_pagina' => $this->number_page,
            'imagen' => Storage::url($this->image_normal),
            'imagen_small' => Storage::url($this->image_small),
            'nro_refs' => 0,
            'refs' => [],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
