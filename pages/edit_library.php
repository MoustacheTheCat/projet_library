<?php 
require('../php/config.php');
require('../php/actionVerifIsAdmin.php');
$pageTitle = 'Edit Books in Library';
$listBooks = getAllBookAndAuthorName($db,'book_id','bookName', 'authFirstName', 'authLastName', 'books', 'authors');
include('../layout/header.php');
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
                    <td><a href="edit_book.php?id=<?php echo $listBook['book_id']; ?>">Edit </a></td>
                    <td><a href="delete_book.php?id=<?php echo $listBook['book_id']; ?>">Delete </a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>









<?php
include('../layout/footer.php');
?>


    
