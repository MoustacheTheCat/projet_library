<?php 


require('../php/config.php');
require('../php/request.php');
$pageTitle = $_GET['name'];
$datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.book_id = books.book_id  JOIN  authors ON books.auth_id = authors.auth_id JOIN categorys ON books_categorys.category_id = categorys.category_id WHERE books.bookName = :bookName");
$datas->execute(array(':bookName' => $pageTitle));
$data = $datas->fetchAll();
$book = $data[0];
include('../layout/header.php');
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
            <?php if (count($data) > 1): ?>
                <ul>
                    <?php foreach($data as $category): ?>
                        <li><?php echo $category['categoryName']; ?></li>
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

<?php
include('../layout/footer.php');
?>