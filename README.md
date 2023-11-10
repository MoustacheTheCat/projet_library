Porjet Library


step 1 -> Create BDD and User mysql

    CREATE DATABASE library;

    CREATE USER 'admin_library'@'localhost' IDENTIFIED BY 'password';
    GRANT ALL PRIVILEGES ON projet_library.* TO 'admin_library'@'localhost';
    FLUSH PRIVILEGES;

    USE library;

    CREATE TABLE authors (
        authors_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        authFirstName varchar(100) NULL,
        authLastName varchar(100) NULL,
        authNatonality varchar(100),
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp(),
        
    );

    CREATE TABLE books (
        books_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        bookName varchar(100),
        authors_id int(11),
        bookDate date,
        bookPrice int(11)
        bookDescription text,
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
        
    );

    CREATE TABLE categorys (
        categorys_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        categoryName varchar(100),
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
    );

    CREATE TABLE books_categorys (
        books_id int(11),
        categorys_id int(11),
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
    );

    

    ALTER TABLE books ADD CONSTRAINT  auth_FK  FOREIGN KEY (authors_id) REFERENCES authors (authors_id);

    ALTER TABLE books_categorys ADD CONSTRAINT books_id_categorys_id_FK FOREIGN KEY (books_id) REFERENCES books (books_id) ON DELETE CASCADE ON UPDATE CASCADE;

    ALTER TABLE books_categorys ADD CONSTRAINT categorys_id_books_id_FK FOREIGN KEY (categorys_id) REFERENCES categorys (categorys_id) ON DELETE CASCADE ON UPDATE CASCADE;

step 2 -> Create Action/ActionRequire.php  and Action/request.php

step 3 -> Create index.php , Layout/LayoutHeader.php , Layout/LayoutFooter.php

step 4 -> create Pages/PageDetailBook.php 

step 5 -> create Pages/add.php and Action/ActionAddBook.php

step 6 -> create Action/ActionDeleteBook.php

step 7 -> create Pages/edit.php and ActionUpdateBook.php

// step 8 -> add filter 


