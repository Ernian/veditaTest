<?php

require_once './config.php';
require_once './CProducts.php';

$instance = new CProducts;
$products = $instance->getProducts('5');

// echo '<pre>';
// var_dump($products);
// echo '</pre>';
?>

<?php foreach($products as $product):?>
<div>
    Product name - <span><?=$product['PRODUCT_NAME']?></span> |
    Product price - <span><?=$product['PRODUCT_PRICE']?></span> |
    Product article - <span><?=$product['PRODUCT_ARTICLE']?></span> |
    Product quantity - <span><?=$product['PRODUCT_QUANTITY']?></span> |
    Date create - <span><?=$product['DATE_CREATE']?></span> |
    <input data-id="<?=$product['ID']?>" type="button" value="Hide">
</div>
<?php endforeach?>