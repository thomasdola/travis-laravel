<?php

use App\Order;
use App\Product;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OrderTest extends TestCase
{
    protected $order;
    protected $product1;
    protected $product2;

    public function setUp(){
        $this->order = new Order();

        $this->product1 = new Product('Travis CI', 59);
        $this->product2 = new Product('CodeShip CI', 59);

        $this->order->add($this->product1);
        $this->order->add($this->product2);
    }

    /**
     * @test
     */
    public function an_order_consists_of_products(){


        $this->assertCount(2, $this->order->products());
    }

    /**
     * @test*/
    public function an_order_can_determine_the_total_cost_of_its_products(){
        $this->assertEquals(118, $this->order->total());
    }
}
