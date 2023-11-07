<?php
require('config.php');
$arrayCats = array();
$categorys = getAllData($db, 'categorys');
foreach($categorys as $category){
    if(isset($_POST['categoryName__'.$category['categoryName']]) && $_POST['categoryName__'.$category['categoryName']] == $category['categoryName']){
        $arrayCats[] = $category['categoryName'];
    }
}
if(isset($_POST['add_book'])){
    if (!empty($_POST['bookName']) && !empty($_POST['bookDate']) && !empty($_POST['authFirstName']) && !empty($_POST['authLastName']) &&( !empty($arrayCats) || !empty($_POST['addCategoryName']))  && !empty($_POST['bookDescription'])) {
        $authors = getAllData($db, 'authors');
        $vrfAuth = verifAuthor($authors, $_POST['authFirstName'], $_POST['authLastName']);
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
        $books = getAllData($db, 'books');
        if(verifBook ($books, $_POST['bookName'],$auth_id, $_POST['bookDate'])){
            echo 'Le livre existe déjà';
        }else {
            $dataB = $db->prepare("INSERT INTO books (bookName, bookDate, auth_id, bookDescription) VALUES (:bookName, :bookDate, :auth_id, :bookDescription)");
            $dataB->execute(array(':bookName' => $_POST['bookName'], ':bookDate' => $_POST['bookDate'], ':auth_id' => $auth_id, ':bookDescription' => $_POST['bookDescription']));
            $book_id = $db->lastInsertId();
        }
        $categorys = getAllData($db, 'categorys');
        if (!empty($_POST['addCategoryName'])){
            echo 'test';
            $dataC = $db->prepare("INSERT INTO categorys (categoryName) VALUES (:categoryName)");
            $dataC->execute(array(':categoryName' => $_POST['addCategoryName']));
            $id_cat = $db->lastInsertId();
            $dataC = $db->prepare("INSERT INTO books_categorys (book_id, category_id) VALUES (:book_id, :category_id)");
            $dataC->execute(array(':book_id' => $book_id, ':category_id' => $id_cat));
        }
        if (!empty($arrayCats)){
            foreach($arrayCats as $arrayCat){
                foreach($categorys as $category){
                    if ($category['categoryName'] == $arrayCat){
                        $id_cat = $category['category_id'];
                        $dataC = $db->prepare("INSERT INTO books_categorys (book_id, category_id) VALUES (:book_id, :category_id)");
                        $dataC->execute(array(':book_id' => $book_id, ':category_id' => $id_cat));
                    }
                }
            }
        }
        $_SESSION['response'] = 'Book added';
    }
    else {
        $_SESSION['error'] = 'Please fill in all fields';
    }
    responseMessage();
}


?>