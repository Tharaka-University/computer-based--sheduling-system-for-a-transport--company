<?php
require('config/db.php');

$query='SELECT * FROM logbook2';
$result=mysqli_query($conn, $query);
$posts=mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>

 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>adventure</title>
	<link rel="stylesheet" type="text/css" href="welcome.css">
</head>
<body>
	<div class="title">
	
	</div>
	<section class="h1">
		<h1>Adventure</h1>
	</section>
	<section class="info">
		<h2> successfully booked your travels. <br> karibu tena</h2>
		<?php foreach ($posts as $post):?>


		<p style="color: white">hello <?php echo $post['name']; ?> <br> you are travelling to <?php echo $post['destination']; ?> from <?php echo $post['departure']; ?> </p>


	<?php endforeach; ?>


		<a href="mailto:nkirotecr20@gmail.com"> email us</a>
	</section>

</body>
</html>