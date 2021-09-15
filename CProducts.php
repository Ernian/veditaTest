<?php

class CProducts
{
    static $connect = null;

    protected static function getConnect()
    {
        // if(!self::$connect) {
        //     self::$connect = mysqli_connect(HOST, USER, PASSWORD, DB_NAME);
        // }
    }

    public static function getProducts($connect, $limit = '8')
    {
        // self::getConnect();
        $sqlProducts = "select * from products order by date_create desc limit $limit";
        $response = mysqli_query($connect, $sqlProducts);
        if(mysqli_num_rows($response)) {
            while ($row = mysqli_fetch_assoc($response)) {
                $products[] = $row;
            }
            return $products;
        } 
        if (!$connect) {
            return 'Error connect: ' . mysqli_connect_error();
        }
        if (mysqli_num_rows($response) === 0 && $connect) {
            return 'List of products is empty';
        }
    }

    public static function updateTable($sqlRequest)
    {
        self::getConnect();
        mysqli_query(self::$connect, $sqlRequest);
    }
}