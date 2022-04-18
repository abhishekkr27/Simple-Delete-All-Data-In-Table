<?php
	require_once 'conn.php';
	mysqli_query($conn, "DELETE FROM `member`") or die(mysqli_error());
	header("location:index.php");
?>