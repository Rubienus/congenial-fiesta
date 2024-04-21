<?php
     require_once 'class/class.cart.php';
     $cart = new Cart();
    ?>
    
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
</head>
<body>
	<h1>Shopping Cart</h1>
    <div id="content">
        <?php
        switch($cartpage){
                case 'edit':
                    require_once 'cart/edit_cart.php';
                break;
                default:
                    require_once 'cart/add_cart.php';
                break; 
            }
        ?>
    </div> <br>

<table id="data-list">
    <thead>
        <tr>
            <th>Order #</th>
            <th>Quantity of product 1</th>
            <th>Quantity of product 2</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'class/class.cart.php';
        include 'connection.php';
        $cart = new Cart();
        if ($cart_items = $cart->listCartItems()) {
            foreach ($cart_items as $cart_item) {
                extract($cart_item);
                ?>
                <tr>
                    <td><?php echo $product_id; ?></td>
                    <td><?php echo $quantity_1; ?></td>
                    <td><?php echo $quantity_2; ?></td>
                    <td><a href="index.php?page=cart&cartpage=edit&product_id=<?php echo $product_id;?>">Edit</a></td>
                </tr>
                <?php
            }   
        } else {
            ?>
            <tr>
                <td colspan="5">No items in the cart</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</body>
</html>