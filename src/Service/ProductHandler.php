<?php

namespace App\Service;

class ProductHandler
{
    /**
    * @var array
    */
    protected $products = [];

    /**
    * 默认商品列表
    * @param array $products
    */
    public function __construct($products = [])
    {
        $this->products = $products;
    }

    /**
     * 计算商品总金额
     * @return int
     */
    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        return $totalPrice;
    }

    /**
     * 按种类查询商品信息
     * @param string $type 根据种类筛选，为空则全部
     * @return array
     */
    public function getProductsByType(string $type = '')
    {
        $keysValue = [];
        $products  = [];
        foreach ($this->products as $product) {
            if(empty($type) || $product["type"] == $type) {
                $keysValue[] = $product["price"];
                $products[]  = $product;
            }
        }
        array_multisort($keysValue, SORT_DESC, $products);
        return $products;
    }

    /**
     * 创建时间转成时间戳
     * @return array
     */
    public function createdToTimestamp()
    {
        $products  = [];
        foreach ($this->products as $product) {
            $product["create_at"] = strtotime($product["create_at"]);
            $products[]           = $product;
        }
        return $products;
    }
}