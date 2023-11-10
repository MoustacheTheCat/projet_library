<?php 
require('../Action/ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
$pageTitle = 'Edit Books in Library';
$listBooks = getAllBookAndAuthorName('books_id','bookName', 'authFirstName', 'authLastName', 'books', 'authors');
include('../Layout/LayoutHeader.php');
?>
<div class="edit-book-list">
    <table>
        <caption>List of Books in Library</caption>
        <thead>
            <tr>
                <!-- <th>
                    <form action="actionSelect.php?type=all" method="POST">
                        <input type="checkbox" name="selectAll" id="select">
                        <label for="selectAll">Select All</label>
                    </form>
                </th> -->
                <th>Book Name</th>
                <th>Book Quantity</th>
                <th>Edit book</th>
                <th>Delete book</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listBooks as $listBook): ?>
                <tr>
                    <!-- <td>
                        <form action="actionSelect.php?type=all"  method="POST">
                            <label for="select"></label>
                            <input type="checkbox" name="select" id="select">
                        </form>
                    </td> -->
                    <td><?php echo $listBook['bookName']; ?></td>
                    <td><a href="PageEditBook.php?id=<?php echo $listBook['books_id']; ?>">Edit </a></td>
                    <td><a href="ActionDeleteBook.php?id=<?php echo $listBook['books_id']; ?>">Delete </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include('../Layout/LayoutFooter.php');
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>


    
