<?php
require('../php/config.php');
require('../php/request.php');

$pageName = $_GET['name'];

$pageTitle = 'Edit '. $pageName;
include('../layout/header.php');
$categorys = getAllData($db, 'categorys');

$datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authorFirstName, authors.authorLastName FROM books_categorys JOIN books ON books_categorys.book_id = books.book_id  JOIN  authors ON books.author_id = authors.author_id JOIN categorys ON books_categorys.category_id = categorys.category_id WHERE books.bookName = :bookName");
$datas->execute(array(':bookName' => $pageName));
$data = $datas->fetchAll();
$book = $data[0];
var_dump(count($data));
?>
<div class="edit-book">
    <form action="../php/action_update_book.php?name=<?php echo $_GET['name'];?>" method="POST">
        <label for="bookName">Book Name:</label>
        <input type="text" name="bookName" max="100" placeholder="<?php echo $pageName;?>">
        <label for="bookDate">Year of publication:</label>
        <input type="number" name="bookDate" min="0" max="2023" placeholder="<?php echo $book['bookDate'];?>">
        <label for="authorFirstName">Author First Name :</label>
        <input type="text" name="authorFirstName" id="authorFirstName" max="100" placeholder="<?php echo $book['authorFirstName'];?>">
        <label for="authorFirstName">Author last Name :</label>
        <input type="text" name="authorLastName" id="authorLastName" max="100" placeholder="<?php echo $book['authorLastName'];?>">
        <h2>Categorys :</h2>
        <?php if(count($data) > 1) : ?>
            <?php 
                $nbCat = count($data); 
                $arrayCat = array();
                for ($i = 0; $i < $nbCat; $i++) {
                    $arrayCat[] = $data[$i]['categoryName'];
                }
            ?>
            <h3>Book categorys Actif :</h3>
            <p>Select category for delete</p>
            <ul>
            <?php foreach($categorys as $category) :?>
                <?php if(in_array($category['categoryName'], $arrayCat)): ?>
                    <li>
                        <input type="checkbox" name="categoryNameActif_.<?php echo $category['categoryName']; ?>" id="categoryName" value="<?php echo $category['categoryName']; ?>">
                        <label for="categoryNameActif_.<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></label>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            </ul>
            <h3>Update book categorys :</h3>
            <p>Select category for Update</p>
            <?php foreach($categorys as $category) :?>
                <?php if(!in_array($category['categoryName'], $arrayCat)): ?>
                    <li>
                        <input type="checkbox" name="categoryNameUpdate_.<?php echo $category['categoryName']; ?>" id="categoryName" value="<?php echo $category['categoryName']; ?>">
                        <label for="categoryNameUpdate_.<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></label>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <label for="addCategory">Add category</label>
            <input type="text" name="addCategory" id="addCategory" max="100">
        <?php else : ?>
            <h3>Book categorys Actif :</h3>
            <p>Select category for delete</p>
            <ul>
            <?php foreach($categorys as $category) :?>
                <?php if($book['categoryName'] == $category['categoryName']): ?>
                    <li>
                        <input type="checkbox" name="categoryNameActif_.<?php echo $category['categoryName']; ?>" id="categoryName" value="<?php echo $category['categoryName']; ?>">
                        <label for="categoryNameActif_.<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></label>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            </ul>
            <h3>Update book categorys :</h3>
            <p>Select category for Update</p>
            <?php foreach($categorys as $category) :?>
                <?php if($book['categoryName'] != $category['categoryName']): ?>
                    <li>
                        <input type="checkbox" name="categoryNameUpdate_.<?php echo $category['categoryName']; ?>" id="categoryName" value="<?php echo $category['categoryName']; ?>">
                        <label for="categoryNameUpdate_.<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></label>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
            <label for="addCategory">Add category</label>
            <input type="text" name="addCategory" id="addCategory" max="100">
        <?php endif; ?>
        <label for="bookDescription">Book Description</label>
        <textarea name="bookDescription" id="bookDescription" cols="30" rows="10" placeholder="<?php echo $book['bookDescription'];?>"></textarea>
        <input type="submit" value="Edit a book" name="update_book">
    </form>
</div>
<?php
include('../layout/footer.php');
?>