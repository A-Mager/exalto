<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    protected $fillable = ['pdfLinkNl', 'pdfLinkEn'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
