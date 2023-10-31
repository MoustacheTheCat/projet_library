<?php
require('config.php');
require('request.php');
$count = 0;
$id_auth = 0;
if (isset($_GET['name'])) {
    $books = getAllData($db, 'books');
    foreach ($books as $book) {
        if ($book['bookName'] == $_GET['name']) {
            $id = $book['book_id'];
            $id_auth = $book['author_id'];
        }
        
        if ($book['author_id'] == $id_auth) {
            $count++;
        }
    }
    $data = $db->prepare("DELETE FROM books WHERE book_id = :book_id");
    $data->execute(array(':book_id' => $id));
    if ($count === 1) {
        $dataA = $db->prepare("DELETE FROM authors WHERE author_id = :author_id");
        $dataA->execute(array(':author_id' => $id_auth));
    }
    header('Location: ../index.php');
}
?>