<?php

require('config.php');
require('request.php');

$bookN = $_GET['name'];

$datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authorFirstName, authors.authorLastName FROM books_categorys JOIN books ON books_categorys.book_id = books.book_id  JOIN  authors ON books.author_id = authors.author_id JOIN categorys ON books_categorys.category_id = categorys.category_id WHERE books.bookName = :bookName");
$datas->execute(array(':bookName' => $bookN));
$data = $datas->fetchAll();
$book = $data[0];
$bookId = $book['book_id'];
$authId = $book['author_id'];
if (isset($_POST['update_book'])){
    if(!empty($_POST['bookName'])) {
        $bookName = $_POST['bookName'];
    }else{
        $bookName = $book['bookName'];
    }
    if(!empty($_POST['bookDate'])){
            $bookDate = $_POST['bookDate'];
    }
    else {
        $bookDate = $book['bookDate'];
    }
    if(!empty($_POST['authorFirstName'])){
        $authorFirstName = $_POST['authorFirstName'];
    }
    else {
        $authorFirstName = $book['authorFirstName'];
    }
    if(!empty($_POST['authorLastName'])){
        $authorLastName = $_POST['authorLastName'];
    }
    else {
        $authorLastName = $book['authorLastName'];
    }
    
    if(!empty($_POST['bookDescription'])){
        $bookDescription = $_POST['bookDescription'];
    }
    else {
        $bookDescription = $book['bookDescription'];
    }
    if(count($data) === 1){
        if(!empty($_POST['categoryName'])){
            $categoryName = $_POST['categoryName'];
        }
        else {
            $categoryName = $book['categoryName'];
        }
         // $dataC = $db->prepare("UPDATE categorys SET categoryName = :categoryName WHERE book_id = :book_id");
        // $dataC->execute(array(':categoryName' => $categoryName, ':book_id' => $bookId));
    } 
    
   
    
    // $dataB = $db->prepare("UPDATE books SET bookName = :bookName, bookDate = :bookDate, bookDescription = :bookDescription WHERE book_id = :book_id");
    // $dataB->execute(array(':bookName' => $bookName, ':bookDate' => $bookDate, ':bookDescription' => $bookDescription, ':book_id' => $bookId));
    // $dataA = $db->prepare("UPDATE authors SET authorFirstName = :authorFirstName, authorLastName = :authorLastName WHERE author_id = :author_id");
    // $dataA->execute(array(':authorFirstName' => $authorFirstName, ':authorLastName' => $authorLastName, ':author_id' => $authId));
    // $nbCat = count($data);
    // $dat1=$data[0]['categoryName'];
    // var_dump($dat1);
    // $dat2=$data[1]['categoryName'];
    // var_dump($dat2);
    // if($nbCat == 1){
       
    // }
    // else{
    //     for($i=0; $i<$nbCat; $i++){
            // $dataC = $db->prepare("UPDATE categorys SET categoryName = :categoryName WHERE book_id = :book_id");
            // $dataC->execute(array(':categoryName' => $categoryName[$i], ':book_id' => $bookId));
      // }
        // $dataC = $db->prepare("UPDATE categorys SET categoryName = :categoryName WHERE book_id = :book_id");
        // $dataC->execute(array(':categoryName' => $categoryName, ':book_id' => $bookId));
        // $dataC = $db->prepare("UPDATE categorys SET categoryName = :categoryName WHERE book_id = :book_id");
        // $dataC->execute(array(':categoryName' => $categoryName, ':book_id' => $bookId));
    //}
    // $dataC = $db->prepare("UPDATE categorys SET categoryName = :categoryName WHERE book_id = :book_id");
    // $dataC->execute(array(':categoryName' => $categoryName, ':book_id' => $bookId));
}

?>