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
?>

<?php include('Layout/LayoutHeader.php'); ?>

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

    <?php include('Layout/LayoutFormFilter.php'); ?>

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
                    <?php printListBooks($filter); ?>
                <?php else : ?>
                    <?php if (isset($_GET['filter'])):?>
                        <?php printListBooks($_GET['filter']); ?>
                        <?php print_r(printListBooks($_GET['filter'])); ?>
                    <?php endif; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>    
    <?php endif; ?>
<?php include('Layout/LayoutFooter.php'); ?>

