<?php
	$connect = mysqli_connect('localhost', 'root', '', 'tvprogram');
	
	if(mysqli_connect_errno()){
		echo 'Failed to connect';
	}
?>