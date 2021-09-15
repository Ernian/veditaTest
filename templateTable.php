<?php if(is_array($products) && count($products)):?>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Product name</th>
                <th>Product price</th>
                <th>Product article</th>
                <th>Product quantity</th>
                <th>Date create</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="table">
            <?php foreach($products as $product):?>
                <?php if(!$product['HIDE']):?>
                    <tr data-id="<?=$product['ID']?>">
                        <td><?=$product['PRODUCT_NAME']?></td>
                        <td><?=$product['PRODUCT_PRICE']?></td>
                        <td><?=$product['PRODUCT_ARTICLE']?></td>
                        <td>
                            <button data-action="-" class="btn btn-success">-</button>       
                            <?=$product['PRODUCT_QUANTITY']?>
                            <button data-action="+" class="btn btn-success">+</button>
                        </td>
                        <td><?=$product['DATE_CREATE']?></td>
                        <td>
                            <button class="btn btn-primary" >Hide</button>
                        </td>
                    </tr>
                <?php endif ?>
            <?php endforeach?>
        </tbody>
    </table>
<?php else:?>
    <h4><?=$products?></h4>
<?php endif?>