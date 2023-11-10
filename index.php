<?php 
require('Action/ActionRequire.php');
$pageTitle = 'Library';
$listBooks = getAllBookAndAuthorName();
$categorys = getAllData('categorys');
$books = getAllData('books');
$auths = getAllData('authors');
$dates =substrDate();
$tabLetters = createSelectFilter('let');
$tabNameAuths = createSelectFilter('auth');
if(!empty($_GET['filter'])){
    $filter = $_GET['filter'];
}
else{
    $filter = "";
}

include('Layout/LayoutHeader.php');
?>
<?php if (!empty($_SESSION['response'])): ?>
    <div class="response">
        <p><?php echo $_SESSION['response']; ?></p>
        
    </div>
<?php elseif(!empty($_SESSION['error'])): ?>
    <div class="error">
        <p><?php echo $_SESSION['error']; ?></p>
    </div>
<?php elseif(!empty($_SESSION['message'])): ?>
    <div class="message">
        <p><?php echo $_SESSION['message']; ?></p>
    </div>
<?php endif; ?>
<div class="form-filter">
        <form action="Action/ActionFilter.php" method="post">
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
                    <?php printListBooks($filter, 0); ?>
                <?php else : ?>
                    <?php if (isset($_GET['filter'])):?>
                        <?php if ($_GET['filter'] == 1): ?>
                            <?php foreach($_SESSION['filterLetter'] as $listBk): ?>
                                <?php foreach($listBooks as $listBook): ?>
                                    <?php if ($listBk == $listBook['bookName']): ?>
                                        <tr>
                                            <td><a href="Pages/PageDetailBook.php?id=<?php echo $listBook['books_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
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
                                            <td><a href="Pages/PageDetailBook.php?id=<?php echo $listBook['books_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
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
                                            <td><a href="Pages/PageDetailBook.php?id=<?php echo $listBook['books_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
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
                                            <td><a href="Pages/PageDetailBook.php?id=<?php echo $listBook['books_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
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
                                            <td><a href="Pages/PageDetailBook.php?id=<?php echo $listBook['books_id']; ?>"><?php echo $listBook['bookName']; ?></a></td>
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
include('Layout/LayoutFooter.php');
?>


    
