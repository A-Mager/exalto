<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    protected $fillable = ['qr_link', 'pdf_nl', 'pdf_en'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
