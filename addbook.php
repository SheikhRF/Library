<?php
include_once("connection.php");
header('Location:books.php');
array_map("htmlspecialchars", $_POST);


$stmt = $conn->prepare("INSERT INTO tbl_books (book_id,title,author,genre,blurb,rating,t_copies,a_copies,cover)
VALUES (:title,:author,:genre,:blurb,:rating,:null,:null,:cover)");


$stmt->bindParam(':title', $_POST["title"]);
$stmt->bindParam(':author', $_POST["author"]);
$stmt->bindParam(':genre', $_POST["genre"]);
$stmt->bindParam(':blurb', $_POST["blurb"]);
$stmt->bindParam(':rating', $_POST["rating"]);
$stmt->bindParam(':t_copies', $_POST["t_copies"]);
$stmt->bindParam(':a_copies', $_POST["a_copies"]);
$stmt->bindParam(':cover', $_POST["cover"]);
$stmt->execute();
$conn=null;