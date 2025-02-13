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
    <style>
        /* Add custom styles for the carousel images */
        .carousel-item img {
            max-width: 300px; /* Set the maximum width of the images */
            max-height: 400px; /* Set the maximum height of the images */
            width: auto; /* Maintain aspect ratio */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
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
                <li class="nav-item"><a href="Books.php"><button type="button" class="btn btn-dark btn-outline-light border-4 rounded-2">ADD BOOK</button></a></li>
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
                echo "<a href='book.php?book_id=" . $book['book_id'] . "'>";
                echo "<img src='" . $book['cover'] . "' class='mx-auto rounded-3 d-block' alt='Book Cover'>";
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

<br><br><br><div class="container-fluid dark_grey_bg">

    <?php
        include_once('connection.php');

        $stmt = $conn->prepare("SELECT title,cover,book_id FROM tbl_books");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = $conn->prepare("SELECT book_id, cover FROM tbl_books");
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $count=0;

        foreach($result as $row){
            
            if($count%3==0){
                echo("</div><div class='row'>");
            }
                echo("<div class='col text-center'>");
                echo "<a href='book.php?book_id=" . $row['book_id'] . "'>";
                echo("<img src='".htmlspecialchars($row['cover'])."'alt='book cover' class='img-fluid rounded-2' style='width: 80%;'>");
                echo "</a>";
                echo("<p class='mt-2'>" . htmlspecialchars($row['title']) . "</p>");
                echo("</div>");

            $count++;
        }
        echo("</div>")
    ?>
</div>

</body>
</html>