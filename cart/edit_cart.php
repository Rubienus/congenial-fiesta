<div id="form-block">
<h3>edit and delete cart</h3>
<form method="POST" action="user/process.php">
    <div id="form-block-half">
        
        <label for="quantity_1">quantity of product 1</label>
        <input type="text" id="quantity_1" class="input" name="quantity_1" value="<?php echo $cart->get_quantity1($product_id) ?? '';?>" placeholder="For product 1..">
        <br>
        <label for="quantity_2">quantity of product 2</label>
        <input type="text" id="quantity_2" class="input" name="quantity_2" value="<?php echo $cart->get_quantity2($product_id) ?? '';?>" placeholder="For product 2..">
        <br>
        <input type="hidden" id="product_id" name="product_id" value="<?php echo $product_id;?>">
    </div>
    <br/>
    <div id="button-block">
        <input type="submit" name="action" value="delete" formmethod="post" formaction="user/process.php?action=delete&type=cart">
        <input type="submit" name="action" value="update" formmethod="post" formaction="user/process.php?action=update&type=cart">
    </div>
</form>
</div>
