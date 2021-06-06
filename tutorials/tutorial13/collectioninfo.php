<?php
	include("db/connect.php");
	$ftmp=$_FILES['mfile']['tmp_name'];
	$path="../upload/".$_FILES['mfile']['name'];
	
	$Fullname =$_POST['fullname'];
	$Firstname=$_POST['firstname'];
	$Lastname = $_POST['lastname'];
	$Email= $_POST['email']; 
	$Password =$_POST['password'];
	$Contact=$_POST['contact'];
	$Birthday= $_POST['birthday']; 
	$Gender	=$_POST['gender'];
	$Passno=$_POST['passno'];
	$Registerby=$_POST['registerby']; 
	$Status=$_POST['status']; 
	move_uploaded_file($ftmp,$path);
	if(isset($_POST['id']))
	{	
		$id=$_POST['id'];
		$sql="UPDATE `members` SET `fullname` = '$Fullname', `firstname` = '$Firstname', `lastname` = '$Lastname', `email` = '$Email', `password` = '$Password' ,`contact` = '$Contact' ,
		`birthday` = '$Birthday' ,`gender` = '$Gender',`passno` = '$Passno' ,`registerby` = '$Registerby' ,`status` = '$Status' ,`photo` = '$path'     
		WHERE `members`.`id` = '$id'";
	}
	else
	{
		$sql="INSERT INTO `members` (`id`, `fullname`,`firstname`, `lastname`, `email`, `password`, `contact`,`birthday`, `gender`, `passno`,  `registerby`,`status`,`photo`) 
		VALUES ('$id','$Fullname' ,'$Firstname', '$Lastname','$Email','$Password','$Contact','$Birthday','$Gender', '$Passno','$Registerby','$Status', '$path')";
	}
	$db->query($sql);
	header("location:index.php");
?>