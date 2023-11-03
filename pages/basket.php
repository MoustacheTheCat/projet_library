<?php 
$pageTitle = 'Basket';
session_start();
require('../php/config.php');
require('../php/request.php');
include('../layout/header.php');
$products = $_SESSION['basket']['products'];
$books = getAllData($db, 'books');

?>
<div class="list_basket">
    <h2>Basket list :</h2>
    <table>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Quantity</th>
                <th>Price HT</th>
                <th>Price TTC</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product): ?>
                <tr>
                    <?php foreach($books as $book): ?>
                        <?php if($book['book_id'] == $product['book_id']): ?>
                            <td><?php echo $book['bookName']; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?php echo $product['bookQuantity']; ?></td>
                    <td><?php echo $product['priceHT']; ?></td>
                    <td><?php echo $product['priceTTC']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="confirm-basket">
    <form action="customer_info.php" method="POST">
        <input type="submit" value="Confirm" name="confirm">
    </form>
</div>

<?php
include('../layout/footer.php');
?>