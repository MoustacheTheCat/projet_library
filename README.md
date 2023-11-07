Porjet Library


step 1 -> Create BDD and User mysql

    CREATE DATABASE library;

    CREATE USER 'admin_library'@'localhost' IDENTIFIED BY 'password';
    GRANT ALL PRIVILEGES ON projet_library.* TO 'admin_library'@'localhost';
    FLUSH PRIVILEGES;

    USE library;

    CREATE TABLE authors (
        auth_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        authFirstName varchar(100) NULL,
        authLastName varchar(100) NULL,
        authNatonality varchar(100),
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp(),
        
    );

    CREATE TABLE books (
        book_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        bookName varchar(100),
        auth_id int(11),
        bookDate date,
        bookPrice int(11)
        bookDescription text,
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
        
    );

    CREATE TABLE categorys (
        category_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        categoryName varchar(100),
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
    );

    CREATE TABLE books_categorys (
        book_id int(11),
        category_id int(11),
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
    );

    

    ALTER TABLE books ADD CONSTRAINT  auth_FK  FOREIGN KEY (auth_id) REFERENCES authors (auth_id);

    ALTER TABLE books_categorys ADD CONSTRAINT book_id_category_id_FK FOREIGN KEY (book_id) REFERENCES books (book_id) ON DELETE CASCADE ON UPDATE CASCADE;

    ALTER TABLE books_categorys ADD CONSTRAINT category_id_book_id_FK FOREIGN KEY (category_id) REFERENCES categorys (category_id) ON DELETE CASCADE ON UPDATE CASCADE;

step 2 -> Create php/config.php  and php/request.php

step 3 -> Create index.php , layout/header.php , layout/footer.php

step 4 -> create pages/detail_book.php 

step 5 -> create pages/add.php and php/action_add_book.php

step 6 -> create php/delete_book.php

step 7 -> create pages/edit.php and action_update_book.php

// step 8 -> add filter 


