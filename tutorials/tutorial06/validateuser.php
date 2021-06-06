<?php
  session_start();
  
  $Username = $_POST['username'];
  $Password = $_POST['password'];
  
	  if($Username =="Dilip Sarvaiya" && $Password == "123456")
	  {
		
        $_SESSION['username'] = "Dilip Sarvaiya";
		$_SESSION['password'] = "123456";
        header("Location:index.php");
	  }
      else
      {
          $_SESSION['valid']="not valid";
          header("Location:login.php");
      }
?>