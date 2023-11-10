<?php

function connect_bd() : PDO {
    require_once '/var/www/html/projet_library/Config/_connect.php';
    try {
        $pdo = new \PDO(DSN, USER, PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
    }
}

function responseMessage(){
    if(!empty($_SESSION['error'])){
        header('Location: ../Pages/PageLogin.php');
        exit;
    }
    else {
        header('Location: ../index.php');
        exit;
    }
}

function responseFilter($tab, $filterName, $filter){
    if(!empty($tab)){   
        $_SESSION[$filterName] = $tab;
        header("Location: ../index.php?filter=".$filter);
        exit;
    }
    else {
        unset($_SESSION[$filterName]);
        $_SESSION['result'] = 'No result found';
        header("Location: ../index.php");
    } 
}
function verifyUserType ($role){
    if(!empty($role['role'])){
        if($role['role'] == 'customers'){
            $_SESSION['message'] = 'You are a customer';
            unset($_SESSION['error']);
        }
        elseif($role['role'] == 'admin'){
            $_SESSION['message'] = 'You are a admin';
            unset($_SESSION['error']);
        }
    }
    else {
        $_SESSION['error'] = 'You are not a customer or admin';
    }
}



//request GET ALL

function getAllData($table_name){
    $db=connect_bd();
    $datas = $db->query("SELECT * FROM  ".$table_name); 
    $array = $datas->fetchAll(PDO::FETCH_ASSOC); 
    return $array;
}

function getAllBookAndAuthorName(){
    $db=connect_bd();
    $datas = $db->query("SELECT books.books_id, books.bookName, authors.authFirstName, authors.authLastName FROM books INNER JOIN authors ON books.authors_id = authors.authors_id ORDER BY bookName ASC"); 
    $array = $datas->fetchAll(PDO::FETCH_ASSOC); 
    return  $array;
}

function getAllBooksDetailWithCategoryAndAuthorName(){
    $db=connect_bd();
    $datas = $db->query("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.books_id = books.books_id  JOIN  authors ON books.authors_id = authors.authors_id JOIN categorys ON books_categorys.categorys_id = categorys.categorys_id ");
    $array = $datas->fetchAll(PDO::FETCH_ASSOC); 
    return $array;   
};



//request GET WHERE 

function getOneData($table_name,$id){
    $db=connect_bd();
    $datas = $db->prepare("SELECT * FROM " .$table_name." WHERE ".$table_name."_id= :id"); 
    $datas->bindValue(':id', $id, \PDO::PARAM_INT);
    $datas->execute();
    $array = $datas->fetchAll(PDO::FETCH_ASSOC); 
    return $array;
}

function getPassword($table_name, $col_password, $array_column ,$id){
    $db=connect_bd();
    $datas = $db->prepare("SELECT $col_password FROM  $table_name WHERE $array_column= :$id"); 
    $datas->bindValue(':id', $id, \PDO::PARAM_INT);
    $datas->execute();
    $password = $datas->fetchAll(PDO::FETCH_ASSOC); 
    return $password;
}

function getOneBookAndAuthorName($id){
    $db=connect_bd();
    $datas = $db->prepare("SELECT books.books_id, books.bookName, authors.authFirstName, authors.authLastName FROM books INNER JOIN authors ON books.authors_id = authors.authors_id WHERE books.books_id= :id"); 
    $datas->bindValue(':id', $id, \PDO::PARAM_INT);
    $datas->execute();
    $array = $datas->fetchAll(PDO::FETCH_ASSOC); 
    return $array;
}

function getOneBookAndAllDetail($id){
    $db=connect_bd();
    $datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.books_id = books.books_id  JOIN  authors ON books.authors_id = authors.authors_id JOIN categorys ON books_categorys.categorys_id = categorys.categorys_id WHERE books.books_id = :books_id");
    $datas->bindValue(':books_id', $id, \PDO::PARAM_INT);
    $datas->execute();
    $response = $datas->fetchAll(); 
    return $response;   
};


//VErif author 

function verifAuthor($authors, $authFirstName, $authLastName){
    foreach($authors as $author){
        if($author['authFirstName'] == $authFirstName && $author['authLastName'] == $authLastName){
            return $author['authors_id'];
        }
    }
    return false;
}

function verifBook($books, $bookName, $author, $bookDate){
    foreach($books as $book){

        if($book['bookName'] == $bookName && $book['authors_id'] == $author && $book['bookDate'] == $bookDate){
            return true;
        }
        return false;
    } 
}
