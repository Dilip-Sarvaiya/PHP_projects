<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<style>
#alert{
    padding-top:80px;
}
</style>
</head>
</html>

<?php
	include("connect_mail.php");
	$Name=$_POST['name'];
	$Email = $_POST['email'];
	$Subject= $_POST['subject']; 
	$Message =$_POST['message'];		
	if(!isset($_POST['id']))		
	{
		
			
		$sql="INSERT INTO `mail_table` (`id`,`name`, `email`, `subject`, `message`) 
		VALUES ('$id','$Name', '$Email','$Subject','$Message')";
	}
	
	$db->query($sql);
    echo "<div class='container' id='alert'>";
	echo "<div class='alert alert-success'>Sent Successfully! Thank you"." ".$Name.", We will contact you shortly!";
	echo "</div>";
	echo "</div>";
	
?>
