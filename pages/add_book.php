<?php 
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');
$pageTitle = 'Add a book';
include('../layout/header.php');
$categorys = getAllData($db, 'categorys');
?>
<div class="add-book">
    <form action="../php/action_add_book.php" method="POST">
        <label for="bookName">Book Name:</label>
        <input type="text" name="bookName" max="100">
        <label for="bookDate">Year of publication:</label>
        <input type="date" name="bookDate" min="0" max="2023">
        <label for="authFirstName">Author First Name :</label>
        <input type="text" name="authFirstName" id="authFirstName" max="100">
        <label for="authFirstName">Author last Name :</label>
        <input type="text" name="authLastName" id="authLastName" max="100">
        <h2>Categorys :</h2>
        <?php foreach($categorys as $category) :?>
            <input type="checkbox" name="categoryName_.<?php echo $category['categoryName']; ?>" id="categoryName" value="<?php echo $category['categoryName']; ?>">
            <label for="categoryName_.<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></label>
        <?php endforeach; ?> 
        <label for="addCategoryName">Add category</label>
        <input type="text" name="addCategoryName" max="100">
        <label for="bookDescription">Book Description</label>
        <textarea name="bookDescription" id="bookDescription" cols="30" rows="10"></textarea>
        <input type="submit" value="Add a book" name="add_book">
    </form>
</div>


<?php
include('../layout/footer.php');
?>