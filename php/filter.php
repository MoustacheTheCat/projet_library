<?php
session_start();
require('config.php');
require('request.php');
$listBooks = getAllBookAndAuthorName($db, 'bookName', 'authFirstName', 'authLastName', 'books', 'authors');
$datas = $db->prepare("SELECT books.*, categorys.categoryName  , authors.authFirstName, authors.authLastName FROM books_categorys JOIN books ON books_categorys.book_id = books.book_id  JOIN  authors ON books.auth_id = authors.auth_id JOIN categorys ON books_categorys.category_id = categorys.category_id");
$datas->execute();
$datas = $datas->fetchAll();
$tabFilterLetters = array();
if(isset($_POST['filter'])){
    if(isset($_POST['filterLetter']) || isset($_POST['filterAuthor']) || isset($_POST['filterGenre']) || isset($_POST['filterYear']) || isset($_POST['filterText'])){
        if($_POST['filterLetter'] != 'letter'){
            unset($_SESSION['result']);
            $letter = $_POST['filterLetter'];
            foreach($listBooks as $listBook){
                if(substr($listBook['bookName'],0,1) == $letter){
                    $tabFilterLetters[] = $listBook['bookName'];
                }
            }
            if(!empty($tabFilterLetters)){
                $_SESSION['filterLetter'] = $tabFilterLetters;
                header('Location: ../index.php?filter=1');
                exit;
            }
            else {
                unset($_SESSION['filterLetter']);
                $_SESSION['result'] = 'No result found';
            }
        }
        elseif($_POST['filterAuthor'] != 'author'){
            unset($_SESSION['result']);
            $author = $_POST['filterAuthor'];
            $tabFilterAuthors = array();
            foreach($listBooks as $listBook){
                if($listBook['authFirstName']." ".$listBook['authLastName'] == $author){
                    $tabFilterAuthors[] = $listBook['bookName'];
                }
            }
            if(!empty($tabFilterAuthors)){
                $_SESSION['filterAuthor'] = $tabFilterAuthors;
                header('Location: ../index.php?filter=2');
                exit;
            }
            else {
                unset($_SESSION['filterAuthor']);
                $_SESSION['result'] = 'No result found';
            }
        }
        elseif($_POST['filterGenre'] != 'genre'){
            unset($_SESSION['result']);
            $genre = $_POST['filterGenre'];
            $tabFilterGenres = array();
            foreach($datas as $data){
                if($data['categoryName'] == $genre){
                    $tabFilterGenres[] = $data['bookName'];
                }
            }
            if(!empty($tabFilterGenres)){   
                $_SESSION['filterGenre'] = $tabFilterGenres;
                header('Location: ../index.php?filter=3');
                exit;
            }
            else {
                unset($_SESSION['filterGenre']);
                $_SESSION['result'] = 'No result found';
            }   
        }
        elseif($_POST['filterYear'] != 'year'){
            unset($_SESSION['result']);
            $year = $_POST['filterYear'];
            $tabFilterYears = array();
            foreach($datas as $data){
                $dateY = substr($data['bookDate'],0,4);
                if($dateY == $year){
                    $tabFilterYears[] = $data['bookName'];
                }
            }
            if(!empty($tabFilterYears)){
                $_SESSION['filterYear'] = $tabFilterYears;
                header('Location: ../index.php?filter=4');
                exit;
            }
            else {
                unset($_SESSION['filterYear']);
                $_SESSION['result'] = 'No result found';
            }
        }
        elseif (!empty($_POST['filterText'])) {
            unset($_SESSION['result']);
            $searchText = $_POST['filterText'];
            $tabFilterTexts = array();
            foreach ($listBooks as $listBook) {

                if (stripos($listBook['bookName'], $searchText) != false) {
                    $tabFilterTexts[] = $listBook['bookName'];
                }
            }
            if(!empty($tabFilterTexts)){
                $_SESSION['filterText'] = $tabFilterTexts;
                header('Location: ../index.php?filter=5');
                exit;
            }
            else {
                unset($_SESSION['filterText']);
                $_SESSION['result'] = 'No result found';
            }
        } 
    }
    header('Location: ../index.php');
    exit;
}
?>