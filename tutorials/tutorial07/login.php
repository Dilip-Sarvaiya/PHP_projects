<?php
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script>
	$("document").ready(function(){
	$("#login").click(function(){
		var valUsername=$("#username").val();
		var valPassword=$("#password").val();
		if(valUsername=="" && valPassword=="")
		{
			alert("Please Enter Username and Password");
			return false;
		}
		else if(valUsername=="" )
		{
			alert("Please Enter Username");
			return false;
		}
		else if(valPassword.length<=6)
		{
			alert("Password must be greater than 6 Digits");
			return false;
		}
		else
		{
			return confirm("Your Data Submitted successfully...");
		}
		});
	});
</script>
</head>
<body>
<div class="text-primary">
  <center><h1>Login Form</h1></center>
</div>
<br>

<div class="container">
<?php
    if(isset($_SESSION['valid']))
    {   
        echo "<font color='red'><h4>Invalid entered details.</h4></font>";
		unset($_SESSION['valid']);
	}
?>
<form action="validate.php" method="POST" name="Login_Form">
  
 
		<div class="form-group">
			<label for="uname"><b>Username</b></label>
			<input type="text" class="form-control" id="username"  placeholder="Enter Username" name="username" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username']?>" required "@">
		</div>
		<div class="form-group">
			<label for="psw"><b>Password</b></label>
			<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>" required>
		</div>
		<div class="form-group">
			<input name="Submit" type="submit" id="login" value="Login" class="btn btn-success">
		</div>
		<div class="form-group">
			<label>
			<input type="checkbox" <?php if(isset($_COOKIE['username'])) echo "checked";?> name="remember"> Remember me
			</label>
		</div>
		<div class="form-group">
			<a href="registration.php"><button type="button" class="btn btn-default">Create a Account</button></a>
		</div>
</form>
</div>
</body>
</html>