<?php 
require('../php/config.php');
if(isset($_SESSION['adminId'])){
    require('../php/actionVerifIsAdmin.php');
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
$order = getOneData($db, 'orders', 'orders_id', $orderId);
$order = $order[0];
$pageTitle = 'Order '.$order['ordersNumber'];
$orderDetails = $db->prepare("SELECT * FROM orders_books WHERE orders_id = :orders_id");
$orderDetails->execute(array(
    ':orders_id' => $orderId
));
$orderDetails = $orderDetails->fetchAll();
include('../layout/header.php');
?>
<div class="info-order">
    <p>Order number :</p>
    <p><?php echo $order['ordersNumber'];?></p>
    <p>Order status :</p>
    <p><?php echo $order['ordersStatus'];?></p>
    <p>Order date :</p>
    <p><?php echo $order['createdAt'];?></p>
    <p>Customer Id :</p>
    <p><?php echo $order['customer_id'];?></p>
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
                <?php $book = getOneData($db, 'books', 'book_id', $orderDetail['book_id']); ?>
                <?php $book = $book[0]; ?>
                <tr>
                    <td><?php echo $book['bookName']; ?></td>
                    <td><?php echo $orderDetail['quantity']; ?></td>
                    <td><?php echo $orderDetail['totalHT']; ?></td>
                    <td><?php echo $orderDetail['totalHT']*1.2; ?></td>
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
<?php include('../layout/footer.php');?>
<?php } ?>