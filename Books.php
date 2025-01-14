<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
   <form action="addbook.php" method="post">
  Title:<input type="text" name="title"><br>
  Author:<input type="text" name="author"><br>
  Genre:<input type="text" name="genre"><br>
  Blurb:<input type="text" name="blurb"><br>
  Rating:<input type="TINYINT(1)" name="rating"><br>


  <input type="file" name="cover" id="cover">
  <input type="submit" value="Upload Image" name="submit">
</form>
<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM TblUser");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		{
			echo($row["Forename"].' '.$row["Surname"]."<br>");
		}



?>   
</body>
</html>