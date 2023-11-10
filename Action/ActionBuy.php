<?php
require('ActionRequire.php');
$basket = $_SESSION['basket'];
if(isset($_POST['confirm'])){
    $dataO = $db->prepare("INSERT INTO orders (ordersNumber, customers_id, totalHT, totalTTC, ordersStatus) VALUES (:ordersNumber, :customers_id, :totalHT, :totalTTC, :ordersStatus)");   
    $dataO->execute(array(
        ':ordersNumber' => $_SESSION['basket']['ordersNumber'],
        ':customers_id' => $_SESSION['customerId'],
        ':totalHT' => $_SESSION['basket']['totalPriceHT'],
        ':totalTTC' => $_SESSION['basket']['totalPriceTTC'],
        ':ordersStatus' => 'pending'
    ));
    $orderId = $db->lastInsertId();
    $dataB = $db->prepare("INSERT INTO orders_books (books_id, orders_id, quantity, totalHT, totalTTC) VALUES (:books_id, :orders_id, :quantity, :totalHT, :totalTTC)");
    foreach($basket['products'] as $product){
        $dataB->execute(array(
            ':books_id' => $product['books_id'],
            ':orders_id' => $orderId,
            ':quantity' => $product['bookQuantity'],
            ':totalHT' => ($product['priceHT'])*$product['bookQuantity'],
            ':totalTTC' => ($product['priceTTC'])*$product['bookQuantity']
        ));
    }
    $bookQuantityActuel = 0;
    $books = getAllData('books');
    foreach($basket['products'] as $product){
        foreach($books as $book){
            if($book['books_id'] == $product['books_id']){
                $bookQuantityActuel = $book['bookQuantity'];
            }
        }
        $newQuantity = intval($bookQuantityActuel) - intval($product['bookQuantity']);
        $dataU = $db->prepare("UPDATE books SET bookQuantity = $newQuantity WHERE books_id = :books_id");
        $dataU->execute(array(
            ':books_id' => $product['books_id']
        ));
    }
    $customers = getOneData('customers', $_SESSION['customerId']);
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