<?php
require('ActionRequire.php');
if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
    $db = connect_bd();
    $arrayCats = array();
    $categorys = getAllData('categorys');
    foreach($categorys as $category){
        if(isset($_POST['categoryName__'.$category['categoryName']]) && $_POST['categoryName__'.$category['categoryName']] == $category['categoryName']){
            $arrayCats[] = $category['categoryName'];
        }
    }
    if(isset($_POST['add_book'])){
        if (!empty($_POST['bookName']) && !empty($_POST['bookDate']) && !empty($_POST['authFirstName']) && !empty($_POST['authLastName']) &&( !empty($arrayCats) || !empty($_POST['addCategoryName']))  && !empty($_POST['bookDescription']) && !empty($_POST['bookQuantity']) && !empty($_POST['bookPriceHT']) && !empty($_POST['bookPriceTTC'])) {
            $authors = getAllData('authors');
            $vrfAuth = verifAuthor($authors, $_POST['authFirstName'], $_POST['authLastName']);
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
            $books = getAllData('books');
            if(verifBook ($books, $_POST['bookName'],$authors_id, $_POST['bookDate'])){
                $_SESSION['error'] = 'This book already exists';
            }else {
                $dataB = $db->prepare("INSERT INTO books (bookName, bookDate, authors_id, bookDescription, bookQuantity, bookPriceHT, bookPriceTTC) VALUES (:bookName, :bookDate, :authors_id, :bookDescription, :bookQuantity, :bookPriceHT, :bookPriceTTC)");
                $dataB->bindValue(':bookName', $_POST['bookName'], PDO::PARAM_STR);
                $dataB->bindValue(':bookDate', $_POST['bookDate'], PDO::PARAM_STR);
                $dataB->bindValue(':authors_id', $authors_id, PDO::PARAM_INT);
                $dataB->bindValue(':bookDescription', $_POST['bookDescription'], PDO::PARAM_STR);
                $dataB->bindValue(':bookQuantity', $_POST['bookQuantity'], PDO::PARAM_INT);
                $dataB->bindValue(':bookPriceHT', $_POST['bookPriceHT']);
                $dataB->bindValue(':bookPriceTTC', $_POST['bookPriceTTC']);
                $dataB->execute();
                $books_id = $db->lastInsertId();
            }
            $categorys = getAllData('categorys');
            if (!empty($_POST['addCategoryName'])){
                $dataC = $db->prepare("INSERT INTO categorys (categoryName) VALUES (:categoryName)");
                $dataC->bindValue(':categoryName', $_POST['addCategoryName'], PDO::PARAM_STR);
                $dataC->execute();
                $id_cat = $db->lastInsertId();
                $dataD = $db->prepare("INSERT INTO books_categorys (books_id, categorys_id) VALUES (:books_id, :categorys_id)");
                $dataD->bindValue(':books_id', $books_id, PDO::PARAM_INT);
                $dataD->bindValue(':categorys_id', $id_cat, PDO::PARAM_INT);
                $dataD->execute();
                
            }
            if (!empty($arrayCats)){
                foreach($arrayCats as $arrayCat){
                    foreach($categorys as $category){
                        if ($category['categoryName'] == $arrayCat){
                            $id_cat = $category['categorys_id'];
                            $dataD = $db->prepare("INSERT INTO books_categorys (books_id, categorys_id) VALUES (:books_id, :categorys_id)");
                            $dataD->bindValue(':books_id', $books_id, PDO::PARAM_INT);
                            $dataD->bindValue(':categorys_id', $id_cat, PDO::PARAM_INT);
                            $dataD->execute();
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
}
else {
    $_SESSION['error'] = 'You are not allowed to access this page';
    header('Location: ../index.php');
}

?>