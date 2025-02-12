<?php
include_once('connection.php');

$stmt = $conn->prepare("SELECT book_id, cover FROM tbl_books");
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>THE book store</title>
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
    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $active = "active"; // First image should be active
            foreach ($books as $book) {
                echo "<div class='carousel-item $active'>";
                echo "<a href='book_details.php?book_id=" . $book['book_id'] . "'>";
                echo "<img src='" . $book['cover'] . "' class='mx-auto rounded-3 d-block w-10' alt='Book Cover'>";
                echo "</a>";
                echo "</div>";
                $active = ""; // Remove "active" after the first image
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</div>
</body>
</html>