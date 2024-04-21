<?php
include_once 'class/class.user.php';
include_once 'class/class.cart.php';
include 'connection.php';

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
$cartpage = (isset($_GET['cartpage'])) ? $_GET['cartpage'] : '';
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
$product_id = (isset($_GET['product_id'])) ? $_GET['product_id'] : '';
$user = new User();
$cart = new Cart();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/custom.css">
    <title>index</title>
    
</head>
<body>
<div id="header">
  <div id="nav">
      <a href="index.php"             class="move-left">TEI Delivery</a>
      <a href="index.php?page=user"   class="nav-button">user</a> 
      <a href="index.php?page=sign_in"class="nav-button">log in</a>  
      <a href="index.php?page=sign_up"class="nav-button">sign up</a>  
      <a href="index.php?page=cart"   class="nav-button">cart</a> 
  </div>
</div>  

<div id="content">
<?php
      switch($page){
                case 'user':
                    require_once 'view.php';
                break;
                case 'cart':
                    require_once 'cart.php';
                break;  
                case 'view':
                    require_once 'userbtn.php';
                break; 
                case 'sign_in':
                    require_once 'log-in.php';
                break; 
                case 'sign_up':
                    require_once 'sign-up.php';
                break; 
                default:
                    require_once 'sign-up.php';
                break; 
            }
    ?>
</div>
</body>
</html>