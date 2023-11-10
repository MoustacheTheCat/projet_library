<?php 
require('../Action/ActionRequire.php');
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
$customerId = $_GET['id'];
$customer = getOneData('customers', $customerId);
$customer = $customer[0];
$pageTitle = $customer['customerFirstName']." ".$customer['customerLastName'].' info';
include('../Layout/LayoutHeader.php');
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
    <?php $orders = getAllData('orders'); ?>
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
                    <?php if($order['customers_id'] == $customerId): ?>
                        <tr>
                            <td><?php echo $order['ordersNumber']; ?></td>
                            <td><?php echo $order['ordersStatus']; ?></td>
                            <td><?php echo $order['createdAt']; ?></td>
                            <td><a href="PageOrderInfo.php?id=<?php echo $order['orders_id']; ?>">Detail</a></td>
                        
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<?php
}
include('../Layout/LayoutFooter.php');
?>