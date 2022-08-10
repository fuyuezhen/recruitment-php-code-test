<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\ProductHandler;

/**
 * Class ProductHandlerTest
 */
class ProductHandlerTest extends TestCase
{
    private $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    private $productHandler;

    public function setUp() :void
    {
        $this->productHandler = new ProductHandler($this->products);
    }

    public function testGetTotalPrice()
    {
        $totalPrice = $this->productHandler->getTotalPrice();
        
        $this->assertEquals(143, $totalPrice);
    }

    public function testGetProductsByType()
    {
        $result = $this->productHandler->getProductsByType("Dessert");
        $this->assertCount(2, $result);
        
        return $result;
    }

    public function testCreatedToTimestamp()
    {
        $result = $this->productHandler->createdToTimestamp();
        
        $this->assertTrue(is_array($result));
        // 断言数组$result中含有索引create_at
        $this->assertArrayHasKey('create_at', $result[0]);

        $this->assertTrue(is_int($result[0]['create_at']));
        
        return $result;
    }
}