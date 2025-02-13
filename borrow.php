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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Borrow Book</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="mystyle.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="grey_bg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a href="index.php"><button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">HOME</button></a></li>
                <li class="nav-item"><button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">ACCOUNT</button></li>
                <li class="nav-item"><a href="login.php"><button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">LOGIN</button></a></li>
                <li class="nav-item"><a href="signUp.php"><button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">SIGNUP</button></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="bigpad container-fluid">&nbsp</div>

<div class="container-fluid grey_bg text-light">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header bg-dark text-light">
                    Borrow Book
                </div>
                <div class="card-body">
                    <form method="get" action="borrow.php">
                        <div class="mb-3">
                            <label for="book_id" class="form-label">Book ID</label>
                            <input type="text" class="form-control" id="book_id" name="book_id" value="<?php echo isset($_GET['book_id']) ? htmlspecialchars($_GET['book_id']) : ''; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo isset($_SESSION['user_id']) ? htmlspecialchars($_SESSION['user_id']) : ''; ?>" readonly>
                        </div>
                        <button type="submit" class="btn btn-dark btn-outline-light border-4 rounded-2">Borrow</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>