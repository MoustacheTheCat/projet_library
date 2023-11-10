<?php
require('ActionRequire.php');
$listBooks = getAllBookAndAuthorName();
$datas = getAllBooksDetailWithCategoryAndAuthorName();
$books = getAllData('books');
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
            responseFilter($tabFilterLetters, 'filterLetter', 1);
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
            responseFilter($tabFilterAuthors, 'filterAuthor', 2);
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
            responseFilter($tabFilterGenres, 'filterGenre', 3);  
        }
        elseif($_POST['filterYear'] != 'year'){
            unset($_SESSION['result']);
            $tabFilterYears = array();
            foreach($books as $book){
                if((substr($book['bookDate'],0,4)) == $_POST['filterYear']){
                    $tabFilterYears[] = $book['bookName'];
                }
            }
            responseFilter($tabFilterYears, 'filterYear', 4);
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
            responseFilter($tabFilterTexts, 'filterText', 5);
        } 
    }
    $_SESSION['message']= "Please select a filter";
    header("Location: ../index.php");
}
?>