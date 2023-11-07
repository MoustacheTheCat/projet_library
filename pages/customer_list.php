<?php
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');
$pageTitle = 'Customer list';
include('../layout/header.php');
$customers = getAllData($db, 'customer');
?>
<div class="customer-list">
    <table>
        <thead>
            <tr>
                <th>detail</th>
                <th>Customer Fisrt Name</th>
                <th>Customer Last Name</th>
                <th>Customer Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($customers as $customer): ?>
                <tr>
                    <td><a href="customer_info.php?id=<?php echo $customer['customer_id'];?>">Detail</a></td>
                    <td><?php echo $customer['customerFirstName']; ?></td>
                    <td><?php echo $customer['customerLastName']; ?></td>
                    <td><?php echo $customer['customerEmail']; ?></td>
                    <td><a href="edit_customer.php?id=<?php echo $customer['customer_id'];?>">Edit</a></td>
                    <td><a href="#">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>