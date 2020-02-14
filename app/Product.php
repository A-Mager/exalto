<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['model_number', 'type'];

    public function detail(){
        return $this->hasOne(ProductDetail::class);
    }
}
