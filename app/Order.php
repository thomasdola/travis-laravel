<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order
{

    protected $products = [];

    public function add(Product $product){
        array_push($this->products, $product);
    }

    public function products(){
        return $this->products;
    }

    public function total(){
        return collect($this->products)->sum('price');
    }
}
