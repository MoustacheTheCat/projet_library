<?php
require('../Action/ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
if(!isset($_GET['id']) || empty($_GET['id'])){
    header('Location: ../index.php');
    exit;
}
$dataOneId = $_GET['id'];
$dataOne = getOneData('books', $dataOneId);
$dataOne = $dataOne[0];
$categorys = getAllData('categorys');
$data = getOneBookAndAllDetail($dataOneId);
$nbData = count($data);
$dataOne = $data[0];
$pageTitle = 'Edit '. $dataOne['bookName'];
include('../Layout/LayoutHeader.php');
?>
<div class="edit-book">
    <form action="../Action/ActionUpdateBook.php?name=<?php echo $_GET['id'];?>" method="POST">
        <label for="bookName">Book Name:</label>
        <input type="text" name="bookName" max="100" value="<?php echo $dataOne['bookName'];?>">
        <label for="bookDate">Year of publication:</label>
        <input type="date" name="bookDate" min="0" max="2023" value="<?php echo $dataOne['bookDate'];?>">
        <label for="authFirstName">Author First Name :</label>
        <input type="text" name="authFirstName" id="authFirstName" max="100" value="<?php echo $dataOne['authFirstName'];?>">
        <label for="authFirstName">Author last Name :</label>
        <input type="text" name="authLastName" id="authLastName" max="100" value="<?php echo $dataOne['authLastName'];?>">
        <label for="bookQuantity">Quantity :</label>
        <input type="number" name="bookQuantity" id="bookQuantity" min="1"  value="<?php echo $dataOne['bookQuantity'];?>">
        <label for="bookPriceHT">Book Price HT :</label>
        <input type="number" name="bookPriceHT" id="bookPriceHT" min="1"  value="<?php echo $dataOne['bookPriceHT'];?>">
        <label for="bookPriceTTC">Book Price TTC :</label>
        <input type="number" name="bookPriceTTC" id="bookPriceTTC" min="1"  value="<?php echo $dataOne['bookPriceTTC'];?>">
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
        <textarea name="bookDescription" id="bookDescription" cols="30" rows="10" value="<?php echo $dataOne['bookDescription'];?>"></textarea>
        <input type="submit" value="Edit a book" name="update_book">
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