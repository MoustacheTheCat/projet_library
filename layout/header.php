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
                        <li><a href="../pages/add.php">Add a book</a></li>
                    </ul>
                </div>
            </div>
        </header>
        <main>
        <div class="title">
            <h1><?php echo $pageTitle; ?></h1>
        </div>