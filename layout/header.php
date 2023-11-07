

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle;?></title>
    <link rel="stylesheet" href="../css/style.css">    
</head>
<body>
    <div class="container">
        <header>
            <div class="header-logo">
                <a href="../index.php">Home</a>
            </div>
            <div class="nav">
                <div class="togle-logo">
                    <input type="checkbox" name="togle_logo" id="togle_logo">
                    <label for="togle_logo">
                        <span id="span-1"></span>
                        <span id="span-2"></span>
                        <span id="span-3"></span>
                    </label>
                </div>
                <div class="nav-menu">
                    <ul>
                        
                        <?php if (!empty($_SESSION['customerId'])): ?>
                            <li>
                                <a href="../pages/basket.php">Basket</a>
                                <?php if (!empty($_SESSION['nb_books_in_basket']) &&  $_SESSION['nb_books_in_basket'] > 0): ?>
                                    <span class="nb_books_in_basket"><?php echo $_SESSION['nb_books_in_basket']; ?></span>
                                <?php endif; ?>
                            </li>
                            <li>Customer
                                <ul>
                                    <li><a href="../pages/customer_info.php?id=<?php echo $_SESSION['customerId'];?>">Customer info</a></li>
                                    <li><a href="../php/action_logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php elseif (!empty($_SESSION['adminId'])): ?>
                            <li>Book
                                <ul>
                                    <li><a href="../pages/add_book.php">Add a book</a></li>
                                    <li><a href="../pages/edit_library.php">Edit books list</a></li>
                                </ul>
                            </li>
                            <li>Customer and order
                                <ul>
                                    <li><a href="../pages/customer_list.php">Customers list</a></li>
                                    <li><a href="../pages/order_list.php">Orders list</a></li>
                                </ul>
                            </li>
                            <li>Admin
                                <ul>
                                    <li><a href="../pages/admin_info.php">Admin info</a></li>
                                    <li><a href="../pages/edit_admin.php">Edit acompte</a></li>
                                    <li><a href="../pages/register_admin.php">Add admin</a></li>
                                    <li><a href="../php/action_logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li>
                                <a href="../pages/basket.php">Basket</a>
                                <?php if (!empty($_SESSION['nb_books_in_basket']) &&  $_SESSION['nb_books_in_basket'] > 0): ?>
                                    <span class="nb_books_in_basket"><?php echo $_SESSION['nb_books_in_basket']; ?></span>
                                <?php endif; ?>
                            </li>
                            <li><a href="../pages/login.php">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </header>
        <main>
        <div class="title">
            <h1><?php echo $pageTitle; ?></h1>
        </div>