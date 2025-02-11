<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up - THE Book Store</title>
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">Sign Up</div>
                    <div class="card-body">
                        <form method="POST" action="signup.php">
                            <div class="mb-3">
                                <label class="form-label">Forename:</label>
                                <input type="text" name="forename" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname:</label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address:</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number:</label>
                                <input type="text" name="phone_num" class="form-control" minlength="11" maxlength="11" required>
                            </div>
                            <button type="submit" class="btn btn-dark w-100">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "library";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $forename = $_POST['forename'];
        $surname = $_POST['surname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $phone_num = $_POST['phone_num'];
        $role = 0; 
        
        $stmt = $conn->prepare("INSERT INTO tbl_users (forename, surname, address, email, password, phone_num, role) VALUES (:forename, :surname, :address, :email, :password, :phone_num, :role)");
        $stmt->bindParam(':forename', $forename);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $pass);
        $stmt->bindParam(':phone_num', $phone_num);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        
        echo "<div class='alert alert-success text-center'>Registration successful! <a href='login.php'>Login here</a></div>";
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger text-center'>Error: " . $e->getMessage() . "</div>";
    }
}
?>