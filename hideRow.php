<?php
require_once './config.php';
require_once './CProducts.php';

if($_POST['id']) {
    $id = $_POST['id'];
    $sqlRequest = "update products set hide=1 where id=$id";
    mysqli_query($connect, $sqlRequest);
    echo json_encode(CProducts::getProducts($connect));
}