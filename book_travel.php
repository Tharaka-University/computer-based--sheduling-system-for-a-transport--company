<?php
 
 require('config/db.php');

if (isset($_POST['submit'])) {
	$name=mysqli_real_escape_string($conn, $_POST['name']);
	$destination=mysqli_real_escape_string($conn, $_POST['destination']);
	$departure=mysqli_real_escape_string($conn, $_POST['departure']);
	$parcel=mysqli_real_escape_string($conn, $_POST['parcel']);
 	$type=mysqli_real_escape_string($conn, $_POST['type']);

	$query="INSERT INTO logbook2 (name, destination, departure, parcel, type) values('$name', '$destination', '$departure', '$parcel', '$type')";

	if (mysqli_query($conn, $query)) {
		//if this is okay we execute this
		header('location: your_details.php');
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
	<link rel="stylesheet" type="text/css" href="book_travel.css">
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
		<form method="post" action="book_travel.php">


			<div class="form">
				<label>name</label><br>
				<input type="text" name="name" placeholder="your name">
			</div>

			<div class="form">
				<label>deperture</label><br>
				<input type="text" name="departure" placeholder="your deperture">
			</div>

			<div class="form">
				<label>destination</label><br>
				<input type="text" name="destination" placeholder="your destination">
			</div>

			<div class="form">
				<label for="options">Choose an option:</label>
			<select id="options" name="parcel">
    			<option value="personel">personel</option>
   	 			<option value="good">a good</option>
			</select>

			</div>

			<div class="form">
				<label for="options">type of good:</label>
			<select id="options" name="type">
    			<option value="personel">large</option>
   	 			<option value="good">medium</option>
   	 			<option value="good">small</option>
			</select>

			</div>

			<div class="form">
				<input type="submit" name="submit" value="proceed">
			</div>
		</form>
		</fieldset>
	</section>

</body>
</html>