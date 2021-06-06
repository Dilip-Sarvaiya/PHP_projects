<?php
	include ("db/connect.php");
?>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<script src="jquery.min.js"></script>
</head>
<body>
<div class="container">
<form action="collectioninfo.php" method="POST" id="frm" name="Login_Form" enctype="multipart/form-data" >
		<div class="form-group">
			<label for="firstname"><b>First Name</b></label>
			<input type="text" class="form-control" id="firstname" placeholder="Enter Name" name="firstname" value="" required="@">
		</div>
		<div class="form-group">
			<label for="lastname"><b>Last Name</b></label>
			<input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname"  value="" required>
        </div>
		<div class="form-group">
			<label for="email"><b>Email</b></label>
			<input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="" required>
        </div>
		<div class="form-group">
			<label for="password"><b>Password</b></label>
			<input type="password" class="form-control" id="password"  placeholder="Enter Password" name="password" value="" required>
        </div>
		<div class="form-group">
			<label for="contact"><b>Contact</b></label>
			<input type="number" class="form-control" id="contact" placeholder="Enter Contact" name="contact" value="" required>
		</div>
		<div class="form-group">
			<label for="birthday"><b>Birthday</b></label>
			<input type="date" class="form-control" id="birthday" placeholder="Enter Birthday" name="birthday" value="" required>
		</div>
		<div class="form-group">
			<label for="gender"><b>Gender</b></label>
			<input type="text" class="form-control" id="gender"  placeholder="Enter Gender" name="gender" value="" required>
		</div>
		<div class="form-group">
			<label for="passno"><b>Pass No</b></label>
			<input type="number" class="form-control" id="passno"  placeholder="Enter Passno" name="passno" value="" required>
		</div>
		<div class="form-group">
			<label for="registerby"><b>Register by</b></label>
			<input type="text" class="form-control" id="registerby"  placeholder="Enter Registerby" name="registerby" value="" required >
		</div>
		<div class="form-group">
			<label for="status"><b>Status</b></label>
			<input type="number" class="form-control" id="status"  placeholder="Enter Status" name="status" value="" required>
		</div>
		<div class="form-group">
			<label for="file"><b>Image</b></label>
			</br>
			<input type="file" id="file" name="mfile" value="" required>
		</div>
	
		
		</br>
		<div class="form-group">
			<input  type="submit"  id="login" value="Submit" class="btn btn-success"/>
			<a href="index.php"><input  type="submit"  id="login" value="Back" class="btn btn-secondary"/></a>
            <input  type="reset"   id="reset" value="Reset" class="btn btn-default"/>
		</div>
</form>
</div>
</body>
</html>
