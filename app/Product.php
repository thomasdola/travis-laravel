<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product
{

    public $name;
    public $price;

    public function __construct($name, $price){
        $this->name = $name;
        $this->price = $price;
    }


}
