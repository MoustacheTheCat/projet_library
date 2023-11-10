<?php 
require('../Action/ActionRequire.php');
$db = connect_bd();
if(isset($_SESSION['adminId'])){
    
    $verif = true;
}
elseif (isset($_SESSION['customerId'])){
    $verif = true;
}
else {
    $verif = false;
}
if ($verif){
$orderId = $_GET['id'];
$order = getOneData('orders', $orderId);
$order = $order[0];
$pageTitle = 'Order '.$order['ordersNumber'];
$orderDetails = $db->prepare("SELECT * FROM orders_books WHERE orders_id = :orders_id");
$orderDetails->execute(array(
    ':orders_id' => $orderId
));
$orderDetails = $orderDetails->fetchAll();
print_r($orderDetails);
include('../Layout/LayoutHeader.php');
?>
<div class="info-order">
    <p>Order number :</p>
    <p><?php echo $order['ordersNumber'];?></p>
    <p>Order status :</p>
    <p><?php echo $order['ordersStatus'];?></p>
    <p>Order date :</p>
    <p><?php echo $order['createdAt'];?></p>
    <p>Customer Id :</p>
    <p><?php echo $order['customers_id'];?></p>
</div>
<div class="order-details">
    <table>
        <thead>
            <th>Book name</th>
            <th>Book quantity</th>
            <th>Book price HT</th>
            <th>Book price TTC</th>
        </thead>
        <tbody>
            <?php foreach($orderDetails as $orderDetail): ?>
                <?php $book = getOneData('books', $orderDetail['books_id']); ?>
                <?php $book = $book[0]; ?>
                <tr>
                    <td><?php echo $book['bookName']; ?></td>
                    <td><?php echo $orderDetail['quantity']; ?></td>
                    <td><?php echo $orderDetail['totalHT']; ?></td>
                    <td><?php echo $orderDetail['totalTTC']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total HT</td>
                <td><?php echo $order['totalHT']; ?></td>
            </tr>
            <tr>
                <td colspan="3">Total TTC</td>
                <td><?php echo $order['totalTTC']; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<?php include('../Layout/LayoutFooter.php');?>
<?php } ?>