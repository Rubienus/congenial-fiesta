<?php
include '../class/class.user.php';
include '../class/class.cart.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$type   = isset($_GET['type'  ]) ? $_GET['type'  ] : ''; 
switch($action){
    case 'new':
                if($type == 'user')
                {
                    create_new_user();
                }
                else
                {
                    add_to_cart();
                    //create_new_user();
                }
        
        break;
    case 'update':
        if($type == 'user')
                {
                    update_user();
                }
                else
                {
                    editCart();
                    //create_new_user();
                }
        break;
    case 'delete':
        if($type == 'user')
        {
            delete_user();
        }
        else
        {
            deleteCart();
            //create_new_user();
        }
        break;
}

function create_new_user()
{
 
    $user = new User();
    $email = $_POST['email'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);
    $password = $_POST['password'];

    $result = $user->new_user($email,$password,$lastname,$firstname);
    if($result){
        $id = $user->get_user_id($email);
        header('location: ../index.php?id='.$id);
    }
}

function update_user(){
    $user = new User();
    $user_id = (int)$_POST['userid'];
    $lastname = ucwords($_POST['lastname']);
    $firstname = ucwords($_POST['firstname']);

    $result = $user->update_user($lastname,$firstname,$user_id);
    if($result){
        header('location: ../index.php?id='.$user_id);
    }
}

function delete_user() {
    $user = new User();
    $user_id = (int)$_POST['userid'];

    $result = $user->delete_user($user_id);
    if ($result) {
        header('location: ../index.php?id='.$user_id);
    }
}

function add_to_cart()
{
    $cart       = new Cart();
    $product_id = $_POST['product_id'];
    $product_1  = $_POST['product_1'];
    $product_2  = $_POST['product_2'];
    $quantity_1 = $_POST['quantity_1'];
    $quantity_2 = $_POST['quantity_2'];

    $result = $cart->addCart($product_id, $product_1, $product_2, $quantity_1, $quantity_2);
    header('Location: ../index.php?page=cart'); 
}

function editCart(){
    $cart = new Cart();
    $product_id = $_POST['product_id'];
    $quantity_1 = $_POST['quantity_1'];
    $quantity_2 = isset($_POST['quantity_2']) ? (int)$_POST['quantity_2'] : null;

    $result = $cart->editCart($product_id, $quantity_1, $quantity_2);
    if($result){
        
        header('location: ../index.php?page=cart&id='.$product_id);
    }
}

function deleteCart() {
    $cart = new Cart();
    $product_id = $_POST['product_id'];

    $result = $cart->deleteCart($product_id);
    if ($result) {
        header('location: ../index.php?page=cart&product_id='.$product_id);
    }
}

