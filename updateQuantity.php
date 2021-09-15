<?php
require_once './config.php';
require_once './CProducts.php';

if($_POST['id']) {
    $id = $_POST['id'];
    $action = $_POST['action'];
    $sqlRequest = "update products set product_quantity=product_quantity{$action}1 where id=$id";
    mysqli_query($connect, $sqlRequest);
    echo json_encode(CProducts::getProducts($connect));
}