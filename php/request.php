<?php

//request GET ALL

function getAllData($db, $table_name){
    $data = $db->prepare("SELECT * FROM  $table_name"); 
    $data->execute();
    $names = $data->fetchAll(); 
    return $names;
}

function getAllBookAndAuthorName($db, $colIdB, $colNB, $colFNA, $colLNA, $tB, $tA){
    $data = $db->prepare("SELECT $colIdB, $colNB, $colFNA, $colLNA FROM $tB INNER JOIN $tA ON $tB.auth_id = $tA.auth_id ORDER BY $colNB ASC"); 
    $data->execute();
    $names = $data->fetchAll(); 
    return $names;
}



//request GET WHERE 

function getOneData($db, $table_name, $name_column ,$id){
    $data = $db->prepare("SELECT * FROM  $table_name WHERE $name_column= :$name_column"); 
    $data->execute(array(':'.$name_column => $id));
    $name = $data->fetchAll(); 
    return $name;
}

function getPassword($db, $table_name, $col_password, $name_column ,$id){
    $data = $db->prepare("SELECT $col_password FROM  $table_name WHERE $name_column= :$name_column"); 
    $data->execute(array(':'.$name_column => $id));
    $password = $data->fetchAll(); 
    return $password;
}

function getOneBookAndAuthorName($db, $bA, $colFNA, $colLNA, $tB, $tA, $name_column ,$id){
    $data = $db->prepare("SELECT $bA.*, $colFNA, $colLNA FROM $tB INNER JOIN $tA ON $tB.auth_id = $tA.auth_id WHERE $name_column= :$name_column"); 
    $data->execute(array(':'.$name_column => $id));
    $name = $data->fetchAll(); 
    return $name;
}

function getOneBookAndAllDetail($db ,$tBC, $tB, $tA, $tC, $id){
    $data = $db->prepare("SELECT $tB.*, 'categoryName' , 'authFirstName','authLastName' FROM $tBC JOIN $tB ON $tBC.book_id = $tB.book_id JOIN $tA ON $tB.auth_id = $tA.auth_id JOIN $tC ON $tBC.category_id = $tC.category_id WHERE $tB.bookName = :bookName");
    $data->execute(array(':bookName' => $id));
    $name = $data->fetchAll(); 
    return $name;   
};







//VErif author 

function verifAuthor($authors, $authFirstName, $authLastName){
    foreach($authors as $author){
        if($author['authFirstName'] == $authFirstName && $author['authLastName'] == $authLastName){
            return $author['auth_id'];
        }
    }
    return false;
}

function verifBook($books, $bookName, $author, $bookDate){
    foreach($books as $book){

        if($book['bookName'] == $bookName && $book['auth_id'] == $author && $book['bookDate'] == $bookDate){
            return true;
        }
        return false;
    } 
}

?>
