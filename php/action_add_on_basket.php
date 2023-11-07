<?php
require('config.php');
if(isset($_POST['buy']) && isset($_GET['id'])){
    $bookId = $_GET['id'];
    $bookQuantity = $_POST['bookQuantity'];
    $tabPrice = $_SESSION['bookPrice'];
    if($bookQuantity == ""){
        $bookQuantity = 1;
    }
    foreach($_SESSION['basket']['products'] as $product){
        if($product['book_id'] == $bookId){
            $bookQuantity += $product['bookQuantity'];
        }
    }
    $totalHT = $tabPrice[0] * $bookQuantity;
    $totaTTC = $tabPrice[1] * $bookQuantity;
    $ordersNumber = rand(100000, 999999);
    if(empty($_SESSION['basket'])){
        $_SESSION['basket'] = array();
        $_SESSION['basket']['ordersNumber'] = $ordersNumber;
        $product = array();
        $product['book_id'] = $bookId;
        $product['bookQuantity'] = $bookQuantity;
        $product['priceHT'] = $totaHT;
        $product['priceTTC'] = $totaTTC;
        $_SESSION['basket']['products'][] = $product;
    }
    else{
        $product = array();
        $product['book_id'] = $bookId;
        $product['bookQuantity'] = $bookQuantity;
        $product['priceHT'] = $totaHT;
        $product['priceTTC'] = $totaTTC;
        $_SESSION['basket']['products'][] = $product;
    }
    $_SESSION['nb_books_in_basket'] += 1;
    header('Location: ../index.php');
    exit;
}
?>