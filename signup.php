<?php
 
 require('config/db.php');

if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($conn, $_POST['name']);
	$telphone=mysqli_real_escape_string($conn, $_POST['telphone']);

	$query="INSERT INTO logbook (name, telphone) values('$name', '$telphone')";

	if (mysqli_query($conn, $query)) {
		//if this is okay we execute this
		header('location: book_travel.php');
	}else{
		echo 'something is wrong';
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sign up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>
<body>
	<div class="title">
	
	</div>
	<section class="h1">
		<h1>Adventure</h1>
	</section>

	<section class="info">

		<h2>
			We need your information
		</h2>

		<fieldset>
		<form method="post" action="signup.php">
			<div class="form">
				<label>Your name</label><br>
				<input type="text" name="name" placeholder="your name goes here">
			</div>

			<div class="form">
				<label>Your telphone number</label>
				<input type="number" name="telphone" placeholder="telphone no">
			</div>
			<div class="form">
				<input type="submit" name="submit" value="proceed">
			</div>
		</form>
		</fieldset>
	</section>

</body>
</html>