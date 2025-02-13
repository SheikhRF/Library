<!DOCTYPE html>
<html lang="en">
<head>
    <title>Borrow Book</title>
</head>

<?php
session_start();
include_once('connection.php');
array_map("htmlspecialchars", $_POST);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["book_id"]) && isset($_GET["user_id"])) {
    $book_id = $_GET["book_id"];
    $user_id = $_GET["user_id"];
    $borrow_date = date("Y-m-d");
    $return_date = date("Y-m-d", strtotime($borrow_date . ' + 7 days'));
    $returned = 0

    // Insert into tbl_loans
    $stmt = $conn->prepare("INSERT INTO tbl_loans (loan_id, book_id, user_id, return_date, returned) VALUES (null, :book_id, :user_id, :return_date, :returned)");
    $stmt->bindParam(':book_id', $book_id);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':return_date', $return_date);
    $stmt->bindParam(':returned', $returned);
    $stmt->execute();

    // Update tbl_books to reduce available copies by one
    $update_stmt = $conn->prepare("UPDATE tbl_books SET a_copies = a_copies - 1 WHERE book_id = :book_id");
    $update_stmt->bindParam(':book_id', $book_id);
    $update_stmt->execute();

    echo "Book borrowed successfully!";
}

$conn = null;
?>
