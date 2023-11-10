<?php

require('ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    $bookN = $_GET['name'];
    $categorys = getAllData('categorys');
    $authors = getAllData('authors');
    $datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.books_id = books.books_id  JOIN  authors ON books.authors_id = authors.authors_id JOIN categorys ON books_categorys.categorys_id = categorys.categorys_id WHERE books.bookName = :bookName");
    $datas->execute(array(':bookName' => $bookN));
    $book = $datas->fetchAll();
    $bookId = $book[0]['books_id'];
    $authId = $book[0]['authors_id'];
    $arrayCatActifs = array();
    $arrayCatUpdates = array();
    foreach($categorys as $category){
        if(isset($_POST['categoryNameActif__'.$category['categoryName']]) && $_POST['categoryNameActif__'.$category['categoryName']] == $category['categoryName']){
            $arrayCatActifs[] = $category['categoryName'];
        }
        if(isset($_POST['categoryNameUpdate__'.$category['categoryName']]) && $_POST['categoryNameUpdate__'.$category['categoryName']] == $category['categoryName']){
            $arrayCatUpdates[] = $category['categoryName'];
        }
    }
    $authFirst = $book[0]['authFirstName'];
    $authLast = $book[0]['authLastName'];
    if(isset($_POST['update_book'])){
        if(!empty($_POST['authFirstName']) || !empty($_POST['authLastName']) || !empty($_POST['bookName']) || !empty($_POST['bookDate']) || !empty($_POST['bookDescription']) || !empty($_POST['addCategory']) || !empty($arrayCatActifs) || !empty($arrayCatUpdates)){
            if(!empty($_POST['authFirstName']) || !empty($_POST['authLastName'])){
                if(!empty($_POST['authFirstName'])){
                    $authFirst = $_POST['authFirstName'];
                }
                elseif(!empty($_POST['authLastName'])){
                    $authLast = $_POST['authLastName'];
                }
            }
            $vrfAuth = verifAuthor($authors, $authFirst, $authLast);
            if($vrfAuth == false){
                $dataA = $db->prepare("INSERT INTO authors (authFirstName, authLastName) VALUES (:authFirstName, :authLastName)");
                $dataA->bindValue(':authFirstName', $_POST['authFirstName'], PDO::PARAM_STR);
                $dataA->bindValue(':authLastName',  $_POST['authLastName'], PDO::PARAM_STR);
                $dataA->execute();
                $authors_id = $db->lastInsertId();
            }
            else{
                $authors_id = $vrfAuth; 
            }
            if(!empty($_POST['bookName']) || !empty($_POST['bookDate']) || !empty($_POST['bookDescription'])){
                if(!empty($_POST['bookName'])){
                    $dataB = $db->prepare("UPDATE books SET bookName = :bookName  WHERE books_id = :books_id");
                    $dataB->execute(array(':bookName' => $_POST['bookName'], ':books_id' => $bookId));
                }
                elseif(!empty($_POST['bookDate'])){
                    $dataB = $db->prepare("UPDATE books SET bookDate = :bookDate WHERE books_id = :books_id");
                    $dataB->execute(array(':bookDate' => $_POST['bookDate'], ':books_id' => $bookId));
                }
                elseif(!empty($_POST['bookDescription'])){
                    $dataB = $db->prepare("UPDATE books SET bookDescription = :bookDescription WHERE books_id = :books_id");
                    $dataB->execute(array(':bookDescription' => $_POST['bookDescription'], ':books_id' => $bookId));
                }
            }
            if(!empty($_POST['addCategory'])){
                $dataC = $db->prepare("INSERT INTO categorys (categoryName) VALUES (:categoryName)");
                $dataC->execute(array(':categoryName' => $_POST['addCategory']));
                $id_cat = $db->lastInsertId();
                $dataC = $db->prepare("INSERT INTO books_categorys (books_id, categorys_id) VALUES (:books_id, :categorys_id)");
                $dataC->execute(array(':books_id' => $bookId, ':categorys_id' => $id_cat));
            }
            if(!empty($arrayCatActifs)){
                foreach($arrayCatActifs as $arrayCatActif){
                    foreach($categorys as $category){
                        if ($category['categoryName'] == $arrayCatActif){
                            $id_cat = $category['categorys_id'];
                            $dataD = $db->prepare("DELETE FROM books_categorys WHERE books_id = :books_id AND categorys_id = :categorys_id");
                            $dataD->execute(array(':books_id' => $bookId, ':categorys_id' => $id_cat));
                        }
                    }
                }
            }
            if(!empty($arrayCatUpdates)){
                foreach($arrayCatUpdates as $arrayCatUpdate){
                    foreach($categorys as $category){
                        if ($category['categoryName'] == $arrayCatUpdate){
                            $id_cat = $category['categorys_id'];
                            $dataC = $db->prepare("INSERT INTO books_categorys (books_id, categorys_id) VALUES (:books_id, :categorys_id)");
                            $dataC->execute(array(':books_id' => $bookId, ':categorys_id' => $id_cat));
                        }
                    }
                }
            }
            $_SESSION['response'] = "The book has been updated";
        }
        else {
            $_SESSION['error'] = "all fields are empty";
        }
        responseMessage();
    }
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}

?>