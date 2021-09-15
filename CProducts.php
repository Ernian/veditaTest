<?php

class CProducts
{
    public static function getProducts($connect, $limit = '8')
    {
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

    public static function hideRow($id, $connect)
    {
        $sqlRequest = "update products set hide=1 where id=$id";
        mysqli_query($connect, $sqlRequest);
        echo json_encode(self::getProducts($connect));
    }
    
    public static function updateQuantity($id, $action, $connect)
    {
        $sqlRequest = "update products set product_quantity=product_quantity{$action}1 where id=$id";
        mysqli_query($connect, $sqlRequest);
        echo json_encode(self::getProducts($connect));
    }
}