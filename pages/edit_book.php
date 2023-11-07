<?php
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');

if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location: ../index.php');
    exit;
}
$dataOneId = $_GET['id'];
$dataOne = getOneData($db, 'books', 'book_id', $dataOneId);
$dataOne = $dataOne[0];
$categorys = getAllData($db, 'categorys');
$datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.book_id = books.book_id  JOIN  authors ON books.auth_id = authors.auth_id JOIN categorys ON books_categorys.category_id = categorys.category_id WHERE books.bookName = :bookName");
$datas->execute(array(':bookName' => $dataOne['bookName']));
$data = $datas->fetchAll();
$nbData = count($data);
$dataOne = $data[0];
$pageTitle = 'Edit '. $dataOne['bookName'];
include('../layout/header.php');
?>
<div class="edit-book">
    <form action="../php/action_update_book.php?name=<?php echo $_GET['id'];?>" method="POST">
        <label for="bookName">Book Name:</label>
        <input type="text" name="bookName" max="100" placeholder="<?php echo $dataOne['bookName'];?>">
        <label for="bookDate">Year of publication:</label>
        <input type="date" name="bookDate" min="0" max="2023" placeholder="<?php echo $dataOne['bookDate'];?>">
        <label for="authFirstName">Author First Name :</label>
        <input type="text" name="authFirstName" id="authFirstName" max="100" placeholder="<?php echo $dataOne['authFirstName'];?>">
        <label for="authFirstName">Author last Name :</label>
        <input type="text" name="authLastName" id="authLastName" max="100" placeholder="<?php echo $dataOne['authLastName'];?>">
        <h2>Categorys :</h2>
        <?php if($nbData > 1) : ?>
            <?php 
                $arrayCat = array();
                for ($i = 0; $i < $nbData; $i++) {
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
                <?php if($dataOne['categoryName'] == $category['categoryName']): ?>
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
                <?php if($dataOne['categoryName'] != $category['categoryName']): ?>
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
        <textarea name="bookDescription" id="bookDescription" cols="30" rows="10" placeholder="<?php echo $dataOne['bookDescription'];?>"></textarea>
        <input type="submit" value="Edit a book" name="update_book">
    </form>
</div>
<?php include('../layout/footer.php'); ?>