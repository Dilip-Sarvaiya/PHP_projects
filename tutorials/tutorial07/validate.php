<?php
  session_start();
  
  $Username = $_POST['username'];
  $Password = $_POST['password'];
  
	  if($Username ==$_POST['username'] && $Password ==$_POST['password'] )
	  {
        $_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
		if(isset($_POST['remember'])){
			setcookie("username",$Username,time()+(1200));
			setcookie("password",$Password,time()+(1200));
		}else{
			setcookie("username",$Username,time()-1);
			setcookie("password",$Password,time()-1);
		}
        header("location:index.php");
	  }
      else
      {
          $_SESSION['valid']="not valid";
          header("location:login.php");
      }
?>