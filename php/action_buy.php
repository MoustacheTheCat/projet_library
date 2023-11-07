<?php
require('config.php');
$basket = $_SESSION['basket'];
if(isset($_POST['confirm'])){
    $dataO = $db->prepare("INSERT INTO orders (ordersNumber, customer_id, totalHT, totalTTC, ordersStatus) VALUES (:ordersNumber, :customer_id, :totalHT, :totalTTC, :ordersStatus)");   
    $dataO->execute(array(
        ':ordersNumber' => $_SESSION['basket']['ordersNumber'],
        ':customer_id' => $_SESSION['customerId'],
        ':totalHT' => $_SESSION['basket']['totalPriceHT'],
        ':totalTTC' => $_SESSION['basket']['totalPriceTTC'],
        ':ordersStatus' => 'pending'
    ));
    $orderId = $db->lastInsertId();
    $dataB = $db->prepare("INSERT INTO orders_books (book_id, orders_id, quantity, totalHT, totalTTC) VALUES (:book_id, :orders_id, :quantity, :totalHT, :totalTTC)");
    foreach($basket['products'] as $product){
        $dataB->execute(array(
            ':book_id' => $product['book_id'],
            ':orders_id' => $orderId,
            ':quantity' => $product['bookQuantity'],
            ':totalHT' => ($product['priceHT'])*$product['bookQuantity'],
            ':totalTTC' => ($product['priceTTC'])*$product['bookQuantity']
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
    $customers = getOneData($db, 'customer', 'customer_id', $_SESSION['customerId']);
    $customerEmail = $customers[0]['customerEmail'];
    $to = $customerEmail;
    $subject = 'Order confirmation';
    $message = 'Your order has been confirmed. Your order number is '.$basket['ordersNumber'].'. Thank you for your purchase.';
    $headers = 'From: library@php.com';
    mail($to, $subject, $message, $headers);
    unset($_SESSION['basket']);
    unset($_SESSION['bookPrice']);
    unset($_SESSION['totalPriceHT']);
    unset($_SESSION['totalPriceTTC']);
    unset($_SESSION['nb_books_in_basket']);
    $_SESSION['response'] = "Your order has been confirmed. Your order number is ".$basket['ordersNumber'].". Thank you for your purchase.";
    responseMessage();
}
?>