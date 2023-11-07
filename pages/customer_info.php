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
$customerId = $_GET['id'];
$customer = getOneData($db, 'customer', 'customer_id', $customerId);
$customer = $customer[0];
$pageTitle = $customer['customerFirstName']." ".$customer['customerLastName'].' info';
include('../layout/header.php');
?>
<div class="form-info-customer">
    <h2>Customer info</h2>
    <p>First name : <?php echo $customer['customerFirstName'];?></p>
    <p>Last name : <?php echo $customer['customerLastName'];?></p>
    <p>Email : <?php echo $customer['customerEmail'];?></p>
    <p>Address : <?php echo $customer['customerAdress'];?></p>
    <p>Postal Code : <?php echo $customer['customerZip'];?></p>
    <p>City : <?php echo $customer['customerCity'];?></p>
    <p>Country : <?php echo $customer['customerContry'];?></p>
    <p>Phone : <?php echo $customer['customerPhone'];?></p>
    <p>Birthday : <?php echo $customer['customerBirthday'];?></p>
</div>
<div class="list-order-customer">
    <h2>List Orders</h2>
    <?php $orders = getAllData($db, 'orders'); ?>
    <?php if (empty($orders)): ?>
        <h2>no order</h2>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>order number</th>
                    <th>order status</th>
                    <th>order date</th>
                    <th>order detail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders as $order): ?>
                    <?php if($order['customer_id'] == $customerId): ?>
                        <tr>
                            <td><?php echo $order['ordersNumber']; ?></td>
                            <td><?php echo $order['ordersStatus']; ?></td>
                            <td><?php echo $order['createdAt']; ?></td>
                            <td><a href="order_info.php?id=<?php echo $order['orders_id']; ?>">Detail</a></td>
                        
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php
}
include('../layout/footer.php');
?>