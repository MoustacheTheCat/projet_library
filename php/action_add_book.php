<?php
require('config.php');
require('request.php');
if(isset($_POST['add_book'])){
    if (!empty($_POST['bookName']) && !empty($_POST['bookDate']) && !empty($_POST['authorFirstName']) && !empty($_POST['authorLastName']) &&( !empty($_POST['categoryName']) || !empty($_POST['addCategoryName']))  && !empty($_POST['bookDescription'])) {
        $authors = getAllData($db, 'authors');
        $vrfAuth = verifAuthor($authors, $_POST['authorFirstName'], $_POST['authorLastName']);
        if($vrfAuth == false){
            $dataA = $db->prepare("INSERT INTO authors (authorFirstName, authorLastName) VALUES (:authorFirstName, :authorLastName)");
            $dataA->bindValue(':authorFirstName', $_POST['authorFirstName'], PDO::PARAM_STR);
            $dataA->bindValue(':authorLastName',  $_POST['authorLastName'], PDO::PARAM_STR);
            $dataA->execute();
            $author_id = $db->lastInsertId();
        }
        else{
            $author_id = $vrfAuth;
        }
        $books = getAllData($db, 'books');
        if(verifBook ($books, $_POST['bookName'],$author_id, $_POST['bookDate'])){
            echo 'Le livre existe déjà';
        }else {
            $dataB = $db->prepare("INSERT INTO books (bookName, bookDate, author_id, bookDescription) VALUES (:bookName, :bookDate, :author_id, :bookDescription)");
            $dataB->execute(array(':bookName' => $_POST['bookName'], ':bookDate' => $_POST['bookDate'], ':author_id' => $author_id, ':bookDescription' => $_POST['bookDescription']));
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
        if (!empty($_POST['categoryName'])){
            echo 'test2';
            if (count($_POST['categoryName']) > 1){
                $tabCats = $_POST['categoryName'];
                foreach($tabCats as $tabCat){
                    foreach($categorys as $category){
                        if ($category['categoryName'] == $tabCat){
                            $id_cat = $category['category_id'];
                            $dataC = $db->prepare("INSERT INTO books_categorys (book_id, category_id) VALUES (:book_id, :category_id)");
                            $dataC->execute(array(':book_id' => $book_id, ':category_id' => $id_cat));
                        }
                    }
                }
            }else {
                $nameCat = $_POST['categoryName'][0];
                foreach($categorys as $category){
                    if ($category['categoryName'] == $nameCat){
                        $id_cat = $category['category_id'];
                        $dataC = $db->prepare("INSERT INTO books_categorys (book_id, category_id) VALUES (:book_id, :category_id)");
                        $dataC->execute(array(':book_id' => $book_id, ':category_id' => $id_cat));
                    }
                }
            }
        }
        header('Location: ../index.php');
    }
    else {
        echo 'Veuillez remplir tous les champs';
    }
}


?>