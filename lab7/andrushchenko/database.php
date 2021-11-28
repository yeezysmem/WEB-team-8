<?php
	$connect = mysqli_connect('localhost', 'root', '', 'drugstore');
	
	if(mysqli_connect_errno()){
		echo 'Failed to connect';
	}
?>