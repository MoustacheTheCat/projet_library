<?php 
require('php/config.php');
$pageTitle = 'Library';
$listBooks = getAllBookAndAuthorName($db,'book_id', 'bookName', 'authFirstName', 'authLastName', 'books', 'authors');
$categorys = getAllData($db, 'categorys');
$books = getAllData($db, 'books');
$dates = array();
foreach($books as $book){
    if(!in_array(substr($book['bookDate'],0,4), $dates)){
        $dates[] = substr($book['bookDate'],0,4);
    }
}
sort($dates);
$auths = getAllData($db, 'authors');
$verifL = "";
$verifN =""; 

include('layout/header.php');
function authDet($col1, $col2, $auths){
    foreach($auths as $auth){
        if ($auth['authFirstName'] == $col1 && $auth['authLastName'] == $col2){
            echo "<td><a href='pages/detais_auth.php?id=".$auth['auth_id']."'>".$col1."</a></td>";
            echo "<td><a href='pages/detais_auth.php?id=".$auth['auth_id']."'>".$col2."</a></td>";
        }
        elseif($auth['authFirstName'] == $col1 && $auth['authLastName'] == ""){ 
            echo "<td><a href='pages/detais_auth.php?id=".$auth['auth_id']."'>".$col1."</a></td>";
            echo "<td></td>";
        }
    }
};
$tabLetters = array();
foreach($books as $book){
    if($verifL !== substr($book['bookName'],0,1) && array_search(substr($book['bookName'],0,1), $tabLetters) === false) {
        $tabLetters[]= substr($book['bookName'],0,1);
        $verifL = substr($book['bookName'],0,1);
    } 
}
sort($tabLetters); 
$tabNameAuths = array();
foreach($auths as $auth){
    if($verifN != $auth['authFirstName'] && array_search($auth['authFirstName'], $tabLetters) === false){
        $tabNameAuths[]= $auth['authFirstName']." ".$auth['authLastName'];
        $verifN = $auth['authFirstName'];
    }
}
sort($tabNameAuths);
?>
<div class="form-filter">
        <form action="php/filter.php" method="post">
            <label for="filterLetter">Filter by Letters</label>
            <select name="filterLetter" id="filterLetter">
                <option value="letter">Letter</option>
                <?php foreach($tabLetters as $tabLetter): ?>
                    <option value="<?php echo $tabLetter; ?>"><?php echo $tabLetter; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterAuthor">Filter by Author :</label>
            <select name="filterAuthor" id="filterAuthor">
                <option value="author">Author</option>
                <?php foreach($tabNameAuths as $tabNameAuth): ?>
                    <option value="<?php echo $tabNameAuth;?>"><?php echo $tabNameAuth;?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterGenre">Filter by Genre :</label>
            <select name="filterGenre" id="filterGenre">
            <option value="genre">Genre</option>
            <?php sort($categorys); ?>
                <?php foreach($categorys as $category): ?>
                    <option value="<?php echo $category['categoryName']; ?>"><?php echo $category['categoryName']; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterYear">Filter by Year :</label>
            <select name="filterYear" id="filterYear">
                <option value="year">Year</option>
                <?php foreach($dates as $date): ?>
                    <option value="<?php echo $date; ?>"><?php echo  $date; ?></option>
                <?php endforeach; ?>
            </select>
            <label for="filterText">Recherche :</label>
            <input type="text" name="filterText" placeholder="Recherche">
            <input type="submit" value="Filter" name="filter">
        </form>
    </div>
    <?php if(!empty($_SESSION['result'])): ?>
        <div class="result">
            <p><?php echo $_SESSION['result']; ?></p>
        </div>
    <?php else: ?>
        <div class="book-list">
            <table>
                <caption>List of Books in Library</caption>
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author first name</th>
                        <th>Author last name</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(empty($_GET['filter'])) :?>
                <div class="book-list">
                    <?php foreach($listBooks as $listBook): ?>
                        <tr>
                            <td><a href="pages/detail_book.php?id=<?php echo $listBook['book_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                            <?php authDet($listBook['authFirstName'], $listBook['authLastName'], $auths); ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php if (isset($_GET['filter'])):?>
                        <?php if ($_GET['filter'] == 1): ?>
                            <?php foreach($_SESSION['filterLetter'] as $listBk): ?>
                                <?php foreach($listBooks as $listBook): ?>
                                    <?php if ($listBk == $listBook['bookName']): ?>
                                        <tr>
                                            <td><a href="pages/detail_book.php?id=<?php echo $listBook['book_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                                            <?php authDet($listBook['authFirstName'], $listBook['authLastName'], $auths); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php elseif($_GET['filter'] == 2): ?>
                            <?php foreach($_SESSION['filterAuthor'] as $listBk): ?>
                                <?php foreach($listBooks as $listBook): ?>
                                    <?php if ($listBk == $listBook['bookName']): ?>
                                        <tr>
                                            <td><a href="pages/detail_book.php?id=<?php echo $listBook['book_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                                            <?php authDet($listBook['authFirstName'], $listBook['authLastName'], $auths); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php elseif($_GET['filter'] == 3): ?>
                            <?php foreach($_SESSION['filterGenre'] as $listBk): ?>
                                <?php foreach($listBooks as $listBook): ?>
                                    <?php if ($listBk == $listBook['bookName']): ?>
                                        <tr>
                                            <td><a href="pages/detail_book.php?id=<?php echo $listBook['book_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                                            <?php authDet($listBook['authFirstName'], $listBook['authLastName'], $auths); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php elseif($_GET['filter'] == 4): ?>
                            <?php foreach($_SESSION['filterYear'] as $listBk): ?>
                                <?php foreach($listBooks as $listBook): ?>
                                    <?php if ($listBk == $listBook['bookName']): ?>
                                        <tr>
                                            <td><a href="pages/detail_book.php?id=<?php echo $listBook['book_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                                            <?php authDet($listBook['authFirstName'], $listBook['authLastName'], $auths); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            <?php elseif($_GET['filter'] == 5): ?>
                            <?php foreach($_SESSION['filterText'] as $listBk): ?>
                                <?php foreach($listBooks as $listBook): ?>
                                    <?php if ($listBk == $listBook['bookName']): ?>
                                        <tr>
                                            <td><a href="pages/detail_book.php?id=<?php echo $listBook['book_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
                                            <?php authDet($listBook['authFirstName'], $listBook['authLastName'], $auths); ?>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>    
    <?php endif; ?>

    
<?php
include('layout/footer.php');
?>


    
