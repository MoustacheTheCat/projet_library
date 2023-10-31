<?php 


require('../php/config.php');
require('../php/request.php');
$pageTitle = 'Add a book';
include('../layout/header.php');
$categorys = getAllData($db, 'categorys');

?>
<div class="add-book">
    <form action="../php/action_add_book.php" method="POST">
        <label for="bookName">Book Name:</label>
        <input type="text" name="bookName" max="100">
        <label for="bookDate">Year of publication:</label>
        <input type="number" name="bookDate" min="0" max="2023">
        <label for="authorFirstName">Author First Name :</label>
        <input type="text" name="authorFirstName" id="authorFirstName" max="100">
        <label for="authorFirstName">Author last Name :</label>
        <input type="text" name="authorLastName" id="authorLastName" max="100">
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