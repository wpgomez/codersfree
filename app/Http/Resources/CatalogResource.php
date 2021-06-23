<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class CatalogResource extends JsonResource
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
            'titulo' => $this->title,
            'slug' => $this->slug,
            'subtitulo' => $this->subtitle,
            'contenido' => $this->description,
            'imagen' => Storage::url($this->image),
            'pdf' => Storage::url($this->pdf),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
