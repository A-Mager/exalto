<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['model_name','model_number', 'model_type'];

    public function detail(){
        return $this->hasOne(ProductDetail::class);
    }
}
