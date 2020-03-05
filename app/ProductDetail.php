<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    protected $fillable = ['qr_link', 'pdf_manual_nl', 'pdf_documentation_nl', 'pdf_manual_en', 'pdf_documentation_en'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
