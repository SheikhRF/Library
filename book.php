<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_GET['book_id']) || empty($_GET['book_id'])) {
        die("Book ID not provided.");
    }

    $book_id = $_GET['book_id'];
    $stmt = $conn->prepare("SELECT * FROM tbl_books WHERE book_id = :book_id");
    $stmt->bindParam(':book_id', $book_id);
    $stmt->execute();
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$book) {
        die("Book not found.");
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo htmlspecialchars($book['title']); ?> - THE Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="mystyle.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body class="grey_bg">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">THE Book Store</a>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo htmlspecialchars($book['cover']); ?>" class="img-fluid rounded" alt="Book Cover">
            </div>
            <div class="col-md-8">
                <h2><?php echo htmlspecialchars($book['title']); ?></h2>
                <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
                <p><strong>Genre:</strong> <?php echo htmlspecialchars($book['genre']); ?></p>
                <p><strong>Rating:</strong> <?php echo htmlspecialchars($book['rating']); ?>/5</p>
                <p><strong>Blurb:</strong> <?php echo nl2br(htmlspecialchars($book['blurb'])); ?></p>
                <p><strong>Available Copies:</strong> <?php echo htmlspecialchars($book['a_copies']); ?></p>
                
                <a href="borrow.php?book_id=<?php echo $book['book_id']; ?>" class="btn btn-dark">Borrow</a>
            </div>
        </div>
    </div>
</body>
</html>
