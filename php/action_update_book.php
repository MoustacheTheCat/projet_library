<?php

require('config.php');
require('request.php');
$bookN = $_GET['name'];
$categorys = getAllData($db, 'categorys');
$authors = getAllData($db, 'authors');
$datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.book_id = books.book_id  JOIN  authors ON books.auth_id = authors.auth_id JOIN categorys ON books_categorys.category_id = categorys.category_id WHERE books.bookName = :bookName");
$datas->execute(array(':bookName' => $bookN));
$book = $datas->fetchAll();
$bookId = $book[0]['book_id'];
$authId = $book[0]['auth_id'];
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
            $auth_id = $db->lastInsertId();
        }
        else{
            $auth_id = $vrfAuth; 
        }
        if(!empty($_POST['bookName']) || !empty($_POST['bookDate']) || !empty($_POST['bookDescription'])){
            if(!empty($_POST['bookName'])){
                $dataB = $db->prepare("UPDATE books SET bookName = :bookName  WHERE book_id = :book_id");
                $dataB->execute(array(':bookName' => $_POST['bookName'], ':book_id' => $bookId));
            }
            elseif(!empty($_POST['bookDate'])){
                $dataB = $db->prepare("UPDATE books SET bookDate = :bookDate WHERE book_id = :book_id");
                $dataB->execute(array(':bookDate' => $_POST['bookDate'], ':book_id' => $bookId));
            }
            elseif(!empty($_POST['bookDescription'])){
                $dataB = $db->prepare("UPDATE books SET bookDescription = :bookDescription WHERE book_id = :book_id");
                $dataB->execute(array(':bookDescription' => $_POST['bookDescription'], ':book_id' => $bookId));
            }
        }
        if(!empty($_POST['addCategory'])){
            $dataC = $db->prepare("INSERT INTO categorys (categoryName) VALUES (:categoryName)");
            $dataC->execute(array(':categoryName' => $_POST['addCategory']));
            $id_cat = $db->lastInsertId();
            $dataC = $db->prepare("INSERT INTO books_categorys (book_id, category_id) VALUES (:book_id, :category_id)");
            $dataC->execute(array(':book_id' => $bookId, ':category_id' => $id_cat));
        }
        if(!empty($arrayCatActifs)){
            foreach($arrayCatActifs as $arrayCatActif){
                foreach($categorys as $category){
                    if ($category['categoryName'] == $arrayCatActif){
                        $id_cat = $category['category_id'];
                        $dataD = $db->prepare("DELETE FROM books_categorys WHERE book_id = :book_id AND category_id = :category_id");
                        $dataD->execute(array(':book_id' => $bookId, ':category_id' => $id_cat));
                    }
                }
            }
        }
        if(!empty($arrayCatUpdates)){
            foreach($arrayCatUpdates as $arrayCatUpdate){
                foreach($categorys as $category){
                    if ($category['categoryName'] == $arrayCatUpdate){
                        $id_cat = $category['category_id'];
                        $dataC = $db->prepare("INSERT INTO books_categorys (book_id, category_id) VALUES (:book_id, :category_id)");
                        $dataC->execute(array(':book_id' => $bookId, ':category_id' => $id_cat));
                    }
                }
            }
        }
        header('Location: ../index.php');
    }
    else {
        echo "all fields are empty";
    }
}
?>