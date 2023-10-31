<?php 


require('../php/config.php');
require('../php/request.php');
$pageTitle = 'Edit Books in Library';
$listBooks = getAllBookAndAuthorName($db, 'bookName', 'authorFirstName', 'authorLastName', 'books', 'authors');

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
                    <td><a href="edit.php?name=<?php echo $listBook['bookName']; ?>">Edit <?php echo $listBook['bookName']; ?></a></td>
                    <td><a href="delete_book.php?name=<?php echo $listBook['bookName']; ?>">Delete <?php echo $listBook['bookName']; ?></a></td>
                </tr>
                
           <?php endforeach; ?>
        </tbody>
    </table>
</div>









<?php
include('../layout/footer.php');
?>


    
