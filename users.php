<!DOCTYPE html>
<html>
<head>
    
    <title>Page title</title>
    
</head>
<body>
   <form action="addbook.php" method="post">
  Forename:<input type="text" name="title"><br>
  Address:<input type="text" name="author"><br>
  E-mail Address:<input type="text" name="genre"><br>
  Password:<input type="text" name="blurb"><br>
  Phone Number:<input type="text" name="phone_num"><br>


  <input type="file" name="cover" id="cover">
  <input type="submit" value="Upload Image" name="submit">
</form>

<script>

</script>

<?php
	include_once('connection.php');
	$stmt = $conn->prepare("SELECT * FROM tbl_books");
	$stmt->execute();
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
		
?>   
</body>
</html>