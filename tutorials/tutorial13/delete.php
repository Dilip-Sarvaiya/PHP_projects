<?php
	include ("db/connect.php");
	$id=$_GET['id'];
	$sql="delete from members WHERE id = '$id'";

	$db->query($sql);
	
	header("location:index.php");
?>
