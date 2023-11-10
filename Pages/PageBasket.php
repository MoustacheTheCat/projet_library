<?php 
require('../Action/ActionRequire.php');
$pageTitle = 'Basket';
include('../Layout/LayoutHeader.php');
?>
<?php if (!empty($_SESSION['basket'])): ?>
    <?php $tabTotal = array(); ?>
    <?php $products = $_SESSION['basket']['products']; ?>
    <div class="list_basket">
        <h2>Basket list :</h2>
        <table>
            <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Price HT</th>
                    <th>Price TTC</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php $books = getAllData('books');?>
                <?php foreach($products as $product): ?>
                    <tr>
                        <?php foreach($books as $book): ?>
                            <?php if($book['books_id'] == $product['books_id']): ?>
                                <td><?php echo $book['bookName']; ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <td><?php echo $product['priceHT']; ?></td>
                        <td><?php echo $product['priceTTC']; ?></td>
                        <td>
                            <form action="../Action/ActionUpdateQuantity.php?id=<?php echo $product['books_id'];?>" method="POST">
                                <label for="updateQuantity">Quantity :</label>
                                <input type="number" name="updateQuantity" id="updateQuantity" min="1" value="<?php echo $product['bookQuantity']; ?>">
                                <input type="submit" value="Update" name="update" >
                            </form>
                        </td>
                        <td><a href="../Action/ActionDeleteBookInBasket.php?id=<?php echo $product['books_id'];?>">DELETE</a></td>
                        
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
                                $totalHT += $product['priceHT'];
                            }
                            $tabTotal['totalHT'] = $totalHT;
                            $_SESSION['basket']['totalPriceHT'] = $tabTotal['totalHT'];
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
                            $tabTotal['totalTTC'] = $totalTTC;
                            $_SESSION['basket']['totalPriceTTC'] = $tabTotal['totalTTC'];
                            echo $totalTTC;
                        ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <?php if(isset($_SESSION['customerId'])) :?>
        <div class="confirm-basket">
        <form action="../Action/ActionBuy.php" method="POST">
            <input type="submit" value="Confirm" name="confirm">
        </form>
    </div>
    <?php else :?> 
        <div class="confirm-basket">
        <form action="PageLogin.php" method="POST">
            <input type="submit" value="Confirm" name="confirm">
        </form>
    </div>
    <?php endif; ?>
<?php else: ?>
    <h2>Your basket is empty</h2>
<?php endif; ?>
<?php include('../Layout/LayoutFooter.php'); ?>