<?php

class CProducts
{
    static $connect = null;

    protected function getConnect()
    {
        if(!self::$connect) {
            self::$connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        }
    }

    public function getProducts($limit = '2')
    {
        self::getConnect();
        $sqlProducts = 'select * from products limit ' . $limit;
        $response = mysqli_query(self::$connect, $sqlProducts);
        $products = [];
        if(mysqli_num_rows($response)) {
            while ($row = mysqli_fetch_assoc($response)) {
                $products[] = $row;
            }
        }
        return $products;
    }
}