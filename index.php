<?php 


require('php/config.php');
require('php/request.php');
$pageTitle = 'Library';
$listBooks = getAllBookAndAuthorName($db, 'bookName', 'authorFirstName', 'authorLastName', 'books', 'authors');

include('layout/header.php');
?>




<div class="book-list">
    <table>
        <caption>List of Books in Library</caption>
        <thead>
            <tr>
                <th>Book Name</th>
                <th>Author first name</th>
                <th>Author last name</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listBooks as $listBook): ?>
                <tr>
                    <td><a href="pages/detais.php?name=<?php echo $listBook['bookName']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                    <td><?php echo $listBook['authorFirstName']; ?></td>
                    <td><?php echo $listBook['authorLastName']; ?></td>
                </tr>
                
           <?php endforeach; ?>
        </tbody>
    </table>
</div>









<?php
include('layout/footer.php');
?>


    
