<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
   <form action="addbook.php" method="post">
    Forename:<input type="text" name="forename"><br>
    Surname:<input type="text" name="surname"><br>
    Address:<input type="text" name="address"><br>
    E-mail Address:<input type="text" name="email"><br>
    Password:<input type="text" name="password"><br>
    Phone Number:<input type="text" name="phone_num" minlength="11"><br>


    <input type="file" name="cover" id="cover">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tbl_books");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		
?>   
</body>
</html>