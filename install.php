<?php

$servername = 'localhost';
$username = 'root';
$password= '';
//note no Database mentioned here!!

$sql = "CREATE DATABASE IF NOT EXISTS library";
$conn->exec($sql);
//next 3 lines optional only needed really if you want to go on an do more SQL here!
$sql = "USE library";
$conn->exec($sql);
echo "DB created successfully";

include_once("connection.php");
$statement=$conn->prepare("
DROP TABLE IF EXISTS tbl_books;
CREATE TABLE tbl_books
(book_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title TEXT NOT NULL,
author TEXT NOT NULL,
genre TEXT NOT NULL,
blurb TEXT NOT NULL,
rating TINYINT(1) NOT NULL,
t_copies TINYINT(2) NOT NULL,
a_copies TINYINT(2) NOT NULL,
cover VARCHAR(255) NOT NULL);
");

$statement->execute();
$statement->closeCursor();

include_once("connection.php");
$statement=$conn->prepare("
DROP TABLE IF EXISTS tbl_users;
CREATE TABLE tbl_users
(user_id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username TEXT NOT NULL,
address TEXT NOT NULL,
email TEXT NOT NULL,
password VARCHAR(200) NOT NULL,
phone_num VARCHAR(11) NOT NULL,
role TINYINT(1) NOT NULL);
");

$statement->execute();
$statement->closeCursor();


?>