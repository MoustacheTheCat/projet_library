<?php
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');
$pageTitle = 'Orders list';
include('../layout/header.php');
$orders = getAllData($db, 'orders');
?>
<div class="orders-list">
    <table>
        <thead>
            <tr>
                <th>Orders number</th>
                <th>Orders status</th>
                <th>Orders date</th>
                <th>Customer Id</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><a href="order_info.php?id=<?php echo $order['orders_id'];?>"><?php echo $order['ordersNumber'];?></a></td>
                    <td><?php echo $order['ordersStatus']; ?></td>
                    <td><?php echo $order['createdAt']; ?></td>
                    <td><?php echo $order['customer_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>