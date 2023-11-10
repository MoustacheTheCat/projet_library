<?php 
require('../Action/ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
$pageTitle = 'Add a book';
include('../Layout/LayoutHeader.php');
$categorys = getAllData('categorys');
?>
<div class="add-book">
    <form action="../Action/ActionAddBook.php" method="POST">
        <label for="bookName">Book Name:</label>
        <input type="text" name="bookName" max="100">
        <label for="bookDate">Year of publication:</label>
        <input type="date" name="bookDate" value="0" max="2023">
        <label for="authFirstName">Author First Name :</label>
        <input type="text" name="authFirstName" id="authFirstName" max="100">
        <label for="authFirstName">Author last Name :</label>
        <input type="text" name="authLastName" id="authLastName" max="100">
        <h2>Categorys :</h2>
        <?php foreach($categorys as $category) :?>
            <input type="checkbox" name="categoryName_.<?php echo $category['categoryName']; ?>" id="categoryName" value="<?php echo $category['categoryName']; ?>">
            <label for="categoryName_.<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?> </label>
        <?php endforeach; ?> 
        <label for="addCategoryName">Add category :</label>
        <input type="text" name="addCategoryName" max="100">
        <label for="bookDescription">Book Description</label>
        <textarea name="bookDescription" id="bookDescription" cols="30" rows="10"></textarea>
        <label for="bookQuantity">Quantity :</label>
        <input type="number" name="bookQuantity" id="bookQuantity" value="1"  required>
        <label for="bookPriceHT">Book Price HT :</label>
        <input type="number" name="bookPriceHT" id="bookPriceHT" value="1"  required>
        <label for="bookPriceTTC">Book Price TTC :</label>
        <input type="number" name="bookPriceTTC" id="bookPriceTTC" value="1"  required>
        <input type="submit" value="Add a book" name="add_book">
    </form>
</div>


<?php
include('../Layout/LayoutFooter.php');
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>