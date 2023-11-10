<?php
require('ActionRequire.php');
if(isset($_POST['buy']) && isset($_GET['id'])){
    
    $bookId = $_GET['id'];
    $bookQuantity = $_POST['bookQuantity'];
    
    print_r($tabPrice);
    if($bookQuantity == ""){
        $bookQuantity = 1;
    }
    if(!isset($_SESSION['basket']['products']) || empty($_SESSION['basket']['products']) || !isset($_SESSION['bookPrice']) || empty($_SESSION['bookPrice'])){
        $_SESSION['basket']['products'] = array();
        $_SESSION['bookPrice'] = array();
    }
    $tabPrice = $_SESSION['bookPrice'];
    foreach($_SESSION['basket']['products'] as $product){
        if($product['books_id'] == $bookId){
            $bookQuantity += $product['bookQuantity'];
        }
    }
    $ordersNumber = rand(100000, 999999);
    if(empty($_SESSION['basket'])){
        $_SESSION['basket'] = array();
        $_SESSION['basket']['ordersNumber'] = $ordersNumber;
        $product = array();
        $product['books_id'] = $bookId;
        $product['bookQuantity'] = $bookQuantity;
        $product['priceHT'] = $tabPrice[0] * $bookQuantity;
        $product['priceTTC'] = $tabPrice[1] * $bookQuantity;
        $_SESSION['basket']['products'][] = $product;
    }
    else{
        $product = array();
        $product['books_id'] = $bookId;
        $product['bookQuantity'] = $bookQuantity;
        $product['priceHT'] = $tabPrice[0] * $bookQuantity;
        $product['priceTTC'] = $tabPrice[1] * $bookQuantity;
        $_SESSION['basket']['products'][] = $product;
    }
    $_SESSION['nb_books_in_basket'] += 1;
    $_SESSION['response'] = "Your book has been added to your basket";
    header('Location: ../index.php');
}
?>