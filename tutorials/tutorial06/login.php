<?php
    session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<script src="js\jquery.min.js"></script>
<link rel="stylesheet" href="css\bootstrap.min.css">
<script type='text/javascript'>
        $(document).ready(function(){
            $('#check').click(function(){
             //alert($(this).is(':checked'));
                $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
            });
        });
    </script>
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
		else if(valPassword=="")
		{
			alert("Please Enter Password");
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
    if($_SESSION['valid'] == "not valid")
    {
            
        echo "<font color='red'><h4>Invalid entered details.</h4></font>";
    }
?>
<form action="validateuser.php" method="POST" name="Login_Form">
  
 
		<div class="form-group">
			<label for="uname"><b>Username</b></label>
			<input type="text" class="form-control" id="username"  placeholder="Enter Username" name="username" value="Dilip Sarvaiya" required>
		</div>
		<div class="form-group">
			<label for="psw"><b>Password</b></label>
			<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" value="123456" required>
        </div> 
        <div class="form-group">
            <input type='checkbox' id='check' />
			<label class= "control-label" for="show">Show Password   </label>
        </div>
		<div class="form-group">
			<input name="Submit" type="submit" class="btn btn-success" id="login" value="Login">
		</div>
		<div class="form-group">
			<a href="registration.php"><button type="button" class="btn btn-default">Create a Account</button></a>
		</div>
</form>
</div>
</body>
</html>