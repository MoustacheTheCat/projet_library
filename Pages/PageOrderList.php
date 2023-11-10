<?php
require('../Action/ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
$pageTitle = 'Orders list';
include('../Layout/LayoutHeader.php');
$orders = getAllData('orders');
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
                    <td><a href="PageOrderInfo.php?id=<?php echo $order['orders_id'];?>"><?php echo $order['ordersNumber'];?></a></td>
                    <td><?php echo $order['ordersStatus']; ?></td>
                    <td><?php echo $order['createdAt']; ?></td>
                    <td><?php echo $order['customers_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include('../Layout/LayoutFooter.php');
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>