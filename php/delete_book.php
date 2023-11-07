<?php
require('config.php');
$count = 0;
$id_auth = 0;
if (isset($_GET['name'])) {
    $books = getAllData($db, 'books');
    foreach ($books as $book) {
        if ($book['bookName'] == $_GET['name']) {
            $id = $book['book_id'];
            $id_auth = $book['auth_id'];
        }
        
        if ($book['auth_id'] == $id_auth) {
            $count++;
        }
    }
    $data = $db->prepare("DELETE FROM books WHERE book_id = :book_id");
    $data->execute(array(':book_id' => $id));
    if ($count === 1) {
        $dataA = $db->prepare("DELETE FROM authors WHERE auth_id = :auth_id");
        $dataA->execute(array(':auth_id' => $id_auth));
        $_SESSION['response'] = "The book".$book['bookName']."has been deleted";
    }
    else {
        $_SESSION['error'] = "The book".$book['bookName']."has been deleted";
    }
    responseMessage();
}
?>