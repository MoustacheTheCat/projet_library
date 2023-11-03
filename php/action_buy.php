<?php
session_start();
require('config.php');
require('request.php');
$basket = $_SESSION['basket'];
print_r($basket);
if(isset($_POST['buy_orders'])){
    $dataC =  $db->prepare("INSERT INTO customer (customerFirstName, customerLastName, customerEmail, customerAdress, customerCity, customerZip, customerContry, customerPhone) VALUES (:customerFirstName, :customerLastName, :customerPhone, :customerEmail, :customerAdress, :customerCity, :customerZip, :customerContry)");
    $dataC->execute(array(
        ':customerFirstName' => $_POST['customerFirstName'],
        ':customerLastName' => $_POST['customerLastName'],
        ':customerEmail' => $_POST['customerEmail'],
        ':customerAdress' => $_POST['customerAdress'],
        ':customerCity' => $_POST['customerCity'],
        ':customerZip' => $_POST['customerZip'],
        ':customerContry'   => $_POST['customerContry'],
        ':customerPhone' => $_POST['customerPhone'],
    ));
    $orderTotalHT = 0;
    $orderTotalTTC = 0;
    foreach($basket['products'] as $product){
        $orderTotalHT += $product['priceHT'];
        $orderTotalTTC += $product['priceTTC'];
    }
    $dataO = $db->prepare("INSERT INTO orders (ordersNumber, customer_id, totalHT, totalTTC, ordersStatus) VALUES (:ordersNumber, :customer_id, :totalHT, :totalTTC, :ordersStatus)");   
    $dataO->execute(array(
        ':ordersNumber' => $basket['ordersNumber'],
        ':customer_id' => $db->lastInsertId(),
        ':totalHT' => $orderTotalHT,
        ':totalTTC' => $orderTotalTTC,
        ':ordersStatus' => 'pending'
    ));
    $dataB = $db->prepare("INSERT INTO orders_books (book_id, orders_id, quantity, totalHT, totalTTC) VALUES (:book_id, :orders_id, :quantity, :totalHT, :totalTTC)");
    foreach($basket['products'] as $product){
        if (empty($product['priceHT']) || empty($product['priceTTC']) || empty($product['bookQuantity'])){
            $product['priceHT'] = 0;
            $product['priceTTC'] = 0;
            $product['bookQuantity'] = 0;
        }
        $dataB->execute(array(
            ':book_id' => $product['book_id'],
            ':orders_id' => $db->lastInsertId(),
            ':quantity' => $product['bookQuantity'],
            ':totalHT' => $product['priceHT'],
            ':totalTTC' => $product['priceTTC']
        ));
    }
    $bookQuantityActuel = 0;
    $books = getAllData($db, 'books');
    foreach($basket['products'] as $product){
        foreach($books as $book){
            if($book['book_id'] == $product['book_id']){
                $bookQuantityActuel = $book['bookQuantity'];
            }
        }
        $newQuantity = intval($bookQuantityActuel) - intval($product['bookQuantity']);
        $dataU = $db->prepare("UPDATE books SET bookQuantity = $newQuantity WHERE book_id = :book_id");
        $dataU->execute(array(
            ':book_id' => $product['book_id']
        ));
        
    }
    $to = $_POST['customerEmail'];
    $subject = 'Order confirmation';
    $message = 'Your order has been confirmed. Your order number is '.$basket['ordersNumber'].'. Thank you for your purchase.';
    $headers = 'From: library@php.com';
    mail($to, $subject, $message, $headers);
    unset($_SESSION['basket']);
    unset($_SESSION['nb_books_in_basket']);
    header('Location: ../index.php');
    exit;
}
?>