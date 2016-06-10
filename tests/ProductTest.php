<?php

use App\Product;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    protected $product;

    public function setUp()
    {
        $this->product = new Product('Travis CI', 59);
    }

    /**
     * @test
     */
    public function a_product_has_a_name(){
        $this->assertEquals('Travis CI', $this->product->name);
    }

    /**
     * @test
     */
    public function a_product_has_a_cost(){
        $this->assertEquals(59, $this->product->price);
    }
}
