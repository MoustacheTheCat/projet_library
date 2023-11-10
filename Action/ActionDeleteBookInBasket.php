<?php

require('ActionRequire.php');
if($_GET['id']){
    $idBook = $_GET['id'];
    $products = $_SESSION['basket']['products'];
    foreach($products as $key => $product){
        if($products[$key]['books_id'] == $idBook){
            unset($_SESSION['basket']['products'][$key]);
        }
    }
    $_SESSION['nb_books_in_basket'] -= 1;
    if($_SESSION['nb_books_in_basket'] == 0){
        unset($_SESSION['basket']);
        unset($_SESSION['nb_books_in_basket']);
        unset($_SESSION['bookPrice']);
    }
    $_SESSION['response'] = "Your book has been deleted from your basket";
    header('Location: ../index.php');
}




?>