<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'pdfable_id', 'pdfable_type'];

    public function pdfable()
    {
        return $this->morphTo();
    }
}
