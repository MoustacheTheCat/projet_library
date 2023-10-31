<?php
require('config.php');
require('request.php');

if (isset($_GET['name'])) {
    $books = getAllData($db, 'books');
    foreach ($books as $book) {
        if ($book['bookName'] == $_GET['name']) {
            $id = $book['book_id'];
            $id_auth = $book['author_id'];
        }
    }
    $verifAuth = $db->prepare("SELECT books.* FROM books JOIN authors ON authors.author_id = books.author_id  WHERE books.author_id = :author_id");
    $verifAuth->execute(array(':author_id' => $id_auth));
    $verifAuth = $verifAuth->fetchAll();
    if (count($verifAuth) === 0){
        $data = $db->prepare("DELETE FROM authors WHERE author_id = :author_id");
        $data->execute(array(':author_id' => $id_auth));
    }
}
?>