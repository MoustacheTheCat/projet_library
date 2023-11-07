<?php 
require('../php/config.php');
$pageTitle = 'Basket';
include('../layout/header.php');
?>
<?php if (!empty($_SESSION['basket'])): ?>
    <?php $tabBasket = $_SESSION['basket']; ?>
    <?php $products = $_SESSION['basket']['products']; ?>
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
            <?php $books = getAllData($db, 'books');?>
            <?php foreach($products as $product): ?>
                <tr>
                    <?php foreach($books as $book): ?>
                        <?php if($book['book_id'] == $product['book_id']): ?>
                            <td><?php echo $book['bookName']; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <td><?php echo $product['bookQuantity']; ?></td>
                    <td><?php echo $product['priceTTC']*0.8; ?></td>
                    <td><?php echo $product['priceTTC']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total HT</td>
                <td>
                    <?php 
                        $totalHT = 0;
                        foreach($products as $product){
                            $totalHT += $product['priceTTC']*0.8;
                        }
                        $tabBasket['totalHT'] = $totalHT;
                        echo $totalHT;
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3">Total TTC</td>
                <td>
                <?php 
                        $totalTTC = 0;
                        foreach($products as $product){
                            $totalTTC += $product['priceTTC'];
                        }
                        $tabBasket['totalTTC'] = $totalTTC;
                        echo $totalTTC;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<?php $_SESSION['basket'] = $tabBasket; ?>

<?php if(isset($_SESSION['customerId'])) :?>
    <div class="confirm-basket">
    <form action="../php/action_buy.php" method="POST">
        <input type="submit" value="Confirm" name="confirm">
    </form>
</div>

<?php else :?> 
    <div class="confirm-basket">
    <form action="login.php" method="POST">
        <input type="submit" value="Confirm" name="confirm">
    </form>
</div>
<?php endif; ?>


<?php else: ?>
    <h2>Your basket is empty</h2>
<?php endif; ?>





<?php
include('../layout/footer.php');
?>