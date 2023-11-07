<?php 


require('../php/config.php');

$authId = $_GET['id'];

$auths = getOneData($db, 'authors', 'auth_id', $authId);
$auth= $auths[0];
$pageTitle = $auth['authFirstName']." ".$auth['authLastName'];
$books = getAllData($db, 'books');
include('../layout/header.php');
?>
<div class="auth-detail">
    <ul>
        <li>
            <h2><?php echo $pageTitle;?></h2>
            <ul>
                <li>First Name : <?php echo $auth['authFirstName']; ?></li>
                <li>Last Name : <?php echo $auth['authLastName']; ?></li>
            </ul>
        </li>
        <li>
            <h2>Nationality </h2>
            <ul>
                <li><?php echo $auth['authNatonality'];?></li>
            </ul>
        </li>
    </ul>
</div>
<div-auth-bio>
    <h2>Biography :</h2>
    <!-- <p><?php echo $auth['authBio'];?></p> -->
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic ullam sed expedita fugit, itaque nam commodi eius quae necessitatibus impedit perspiciatis saepe placeat aliquid illum dolor obcaecati. Eum esse asperiores sunt odio fugiat! Pariatur, iusto amet consequatur commodi autem distinctio error natus unde aliquid deserunt! Iste beatae magni quam velit vel ullam nulla similique? Mollitia exercitationem tempora quaerat minima amet iste iure quasi commodi nobis qui molestiae labore officia nemo vel, veniam minus beatae? Nesciunt praesentium quidem tempore iusto sit officiis sunt ipsa soluta molestiae incidunt. Minus corporis voluptates, obcaecati placeat, eos adipisci minima commodi eaque, aliquam tempora quis quidem.</p>
</div-auth-bio>
<div-books-list>
    <h2>Books list :</h2>
    <ul>    
        <?php foreach($books as $book): ?>
            <?php if($book['auth_id'] == $authId): ?>
                <li><a href="detais.php?name=<?php echo $book['bookName'];?>"><?php echo $book['bookName'];?></a></li>
            <?php endif; ?>
        <?php  endforeach; ?>
    </ul>
</div-books-list>

<?php
include('../layout/footer.php');
?>