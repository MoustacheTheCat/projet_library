<?php 


require('../php/config.php');
require('../php/request.php');
$pageTitle = 'Edit Books in Library';
$listBooks = getAllBookAndAuthorName($db,'book_id','bookName', 'authFirstName', 'authLastName', 'books', 'authors');

include('../layout/header.php');
?>




<div class="edit-book-list">
    <table>
        <caption>List of Books in Library</caption>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author first name</th>
                <th>Author last name</th>
                <th>Edit book</th>
                <th>Delete book</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listBooks as $listBook): ?>
                <tr>
                    <td><?php echo $listBook['bookName']; ?></td>
                    <td><a href="edit.php?id=<?php echo $listBook['book_id']; ?>">Edit <?php echo $listBook['bookName']; ?></a></td>
                    <td><a href="delete_book.php?id=<?php echo $listBook['book_id']; ?>">Delete <?php echo $listBook['bookName']; ?></a></td>
                </tr>
                
           <?php endforeach; ?>
        </tbody>
    </table>
</div>









<?php
include('../layout/footer.php');
?>


    
