Porjet Library


step 1 -> Create BDD and User mysql

    CREATE DATABASE library;

    CREATE USER 'admin_library'@'localhost' IDENTIFIED BY 'password';
    GRANT ALL PRIVILEGES ON projet_library.* TO 'admin_library'@'localhost';
    FLUSH PRIVILEGES;

    USE library;

    CREATE TABLE authors (
        author_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        authorFirstName varchar(100) DEFAULT NULL,
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp(),
        authorLastName varchar(100) DEFAULT NULL
    );

    CREATE TABLE books (
        book_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        bookName varchar(100) DEFAULT NULL,
        author_id int(11) DEFAULT NULL,
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp(),
        bookDate varchar(4) DEFAULT NULL,
        bookDescription text DEFAULT NULL
    );

    CREATE TABLE books_categorys (
        book_id int(11) DEFAULT NULL,
        category_id int(11) DEFAULT NULL,
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
    );

    CREATE TABLE categorys (
        category_id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
        categoryName varchar(100) DEFAULT NULL,
        createdAt timestamp NOT NULL DEFAULT current_timestamp(),
        updatedAt timestamp NOT NULL DEFAULT current_timestamp()
    );

    ALTER TABLE books ADD CONSTRAINT  FK_authors  FOREIGN KEY (author_id) REFERENCES authors (author_id);

    ALTER TABLE books_categorys ADD CONSTRAINT FK_books_categorie FOREIGN KEY (book_id) REFERENCES books (book_id) ON DELETE CASCADE ON UPDATE CASCADE;

    ALTER TABLE books_categorys ADD CONSTRAINT books_categorys_FK FOREIGN KEY (category_id) REFERENCES categorys (category_id) ON DELETE CASCADE ON UPDATE CASCADE;

step 2 -> Create php/config.php  and php/request.php

step 3 -> Create index.php , layout/header.php , layout/footer.php

step 4 -> create pages/detais.php 

step 5 -> create pages/add.php and php/action_add_book.php

step 6 -> create php/delete_book.php

step 7 -> create pages/edit.php and action_update_book.php

