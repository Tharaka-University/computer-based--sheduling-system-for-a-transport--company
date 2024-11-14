<?php
$conn=mysqli_connect('localhost', 'root', '', 'actual_project');
if (mysqli_connect_errno()) {
	echo 'failed to connect';
}
else{
	echo 'success <br>';
}
?>
