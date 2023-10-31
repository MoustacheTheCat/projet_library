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
print_r($book['categoryName']);
?>
<div class="add-book">
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
        <?php if(count($data) === 1) : ?>
            <?php foreach($categorys as $category) :?>
                <label for="categoryName"><?php echo $category['categoryName']; ?></label>
                <?php if($category['categoryName'] == $book['categoryName']): ?>
                    <input type="checkbox" name="categoryName" id="categoryName" value="<?php echo $category['categoryName']; ?>" checked>
                <?php else: ?>
                    <input type="checkbox" name="categoryName" id="categoryName" value="<?php echo $category['categoryName']; ?>">
                <?php endif; ?> 
            <?php endforeach; ?> 
        <?php else: ?>
            <?php 
                $nbCat = count($data); 
                $arrayCat = array();
                foreach($categorys as $category) {
                    for ($i = 0; $i < $nbCat; $i++) {
                        if($data[$i]['categoryName'] == $category['categoryName']){
                            $arrayCat[] = $data[$i]['categoryName'];
                        }

                    }
                }
            ?>
            <?php foreach($categorys as $category)  :?>
                <label for="categoryName"><?php echo $category['categoryName']; ?></label>
                <?php if(in_array($category['categoryName'], $arrayCat)): ?>
                    <input type="checkbox" name="categoryName" id="categoryName" value="<?php echo $category['categoryName']; ?>" checked>
                <?php else: ?>
                    <input type="checkbox" name="categoryName" id="categoryName" value="<?php echo $category['categoryName']; ?>">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <label for="bookDescription">Book Description</label>
        <textarea name="bookDescription" id="bookDescription" cols="30" rows="10" placeholder="<?php echo $book['bookDescription'];?>"></textarea>
        <input type="submit" value="Edit a book" name="update_book">
    </form>
</div>


<?php
include('../layout/footer.php');
?>