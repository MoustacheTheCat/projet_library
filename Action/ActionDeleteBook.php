<?php
require('ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    $count = 0;
    $id_auth = 0;
    $db = connect_bd();
    if (isset($_GET['id'])) {
        $books = getAllData('books');
        foreach ($books as $book) {
            if ($book['books_id'] == $_GET['id']) {
                $id = $book['books_id'];
                $id_auth = $book['authors_id'];
            }
            
            if ($book['authors_id'] == $id_auth) {
                $count++;
            }
        }
        $data = $db->prepare("DELETE FROM books WHERE books_id = :books_id");
        $data->execute(array(':books_id' => $id));
        if ($count === 1) {
            $dataA = $db->prepare("DELETE FROM authors WHERE authors_id = :authors_id");
            $dataA->execute(array(':authors_id' => $id_auth));
            $_SESSION['response'] = "The book ".$book['bookName']." and author has been deleted";
        }
        else {
            $_SESSION['response'] = "The book".$book['bookName']."has been deleted";
        }
        responseMessage();
    }
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}
?>