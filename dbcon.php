<?php
$conn = mysqli_connect('localhost','root','','library');
if(!$conn){
	echo "Connection Failed: ".mysqli_error($conn);
	exit;
}
?>
