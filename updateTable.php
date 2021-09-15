<?php

require_once './config.php';
require_once './CProducts.php';

if($_POST['id'] && !$_POST['action']) {
    CProducts::hideRow($_POST['id'], $connect);
}

if($_POST['id'] && $_POST['action']) {
    CProducts::updateQuantity($_POST['id'], $_POST['action'], $connect);
}