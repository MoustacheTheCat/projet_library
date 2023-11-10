<?php 

require('../Action/ActionRequire.php');
$bookId = $_GET['id'];
$datas = getOneBookAndAllDetail($bookId);
$book = $datas[0];
$pageTitle = $book['bookName'];
include('../Layout/LayoutHeader.php');
?>
<div class="book-detail">
    <ul>
        <li>
            <h2>Author</h2>
            <ul>
                <li>First Name : <?php echo $book['authFirstName']; ?></li>
                <li>Last Name : <?php echo $book['authLastName']; ?></li>
            </ul>
        </li>
        <li>
            <h2>Year of publication</h2>
            <ul>
                <li>Published in <?php echo $book['bookDate'];?></li>
            </ul>
        </li>
        <li>
            <h2>Genre</h2>
            <?php if (count($datas) > 1): ?>
                <ul>
                    <?php foreach($datas as $data): ?>
                        <li><?php echo $data['categoryName']; ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php else: ?>
                    <ul>
                        <li><?php echo $book['categoryName']; ?></li>
                    </ul>
            <?php endif; ?>
        </li>
    </ul>
</div>
<div class="book-description">
    <h2>Book Description</h2>
    <p><?php echo $book['bookDescription'];?></p>
</div>
<div class="buy">
    <h2>Buy</h2>
    <?php if ($book['bookQuantity'] > 0): ?>
        <?php 
            $_SESSION['bookPrice'] = [$book['bookPriceHT'],$book['bookPriceTTC']];
        ?>
    <ul>
        <li>Quantity : <?php echo $book['bookQuantity'];?></li>
        <li>Price HT: <?php echo $book['bookPriceHT'];  ?> €</li>
        <li>Price TTC: <?php echo $book['bookPriceTTC']; ?> €</li>
    </ul>
    <form action="../Action/ActionAddOnBasket.php?id=<?php echo $book['books_id'];?>" method="POST">
        <label for="bookQuantity">Quantity :</label>
        <input type="number" name="bookQuantity" id="bookQuantity" max="<?php echo $book['bookQuantity'];?>" value="1">
        <input type="submit" value="add in basket" name="buy">
    </form>
    <?php else: ?>
        <p>Out of stock</p>
    <?php endif; ?>
</div>

<?php
include('../Layout/LayoutFooter.php');
?>