<?php
require('ActionRequire.php');
if(isset($_POST['update'])){
    print_r($_POST);
    $product = $_SESSION['basket']['products'];
    $id = $_GET['id'];
    foreach ($product as $key => $value) {
        if($value['books_id'] == $id){
            if($_POST['updateQuantity'] > $_SESSION['basket']['products'][$key]['bookQuantity']){
                $_SESSION['basket']['products'][$key]['bookQuantity'] = $_POST['updateQuantity'];
                $_SESSION['basket']['products'][$key]['priceHT'] = $_POST['updateQuantity'] * $_SESSION['basket']['products'][$key]['priceHT'];
                $_SESSION['basket']['products'][$key]['priceTTC'] = $_POST['updateQuantity'] * $_SESSION['basket']['products'][$key]['priceTTC'];
            }
            elseif($_POST['updateQuantity'] < $_SESSION['basket']['products'][$key]['bookQuantity']){
                $_SESSION['basket']['products'][$key]['priceHT'] = ($_SESSION['basket']['products'][$key]['priceHT'] / $_SESSION['basket']['products'][$key]['bookQuantity']) * $_POST['updateQuantity']  ;
                $_SESSION['basket']['products'][$key]['priceTTC'] = ($_SESSION['basket']['products'][$key]['priceTTC'] / $_SESSION['basket']['products'][$key]['bookQuantity']) * $_POST['updateQuantity'];
                $_SESSION['basket']['products'][$key]['bookQuantity'] = $_POST['updateQuantity'];
            }
        }
    }
    header('Location: ../index.php');
}  


?>