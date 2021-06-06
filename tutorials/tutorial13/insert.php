<?php
	include ("db/connect.php");
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$sql = "SELECT * FROM `members` WHERE id='$id'";
	$result = $db->query($sql);
		if($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
			$Fullname =$row['fullname'];
			$Firstname=$row['firstname'];
			$Lastname = $row['lastname'];
			$Email= $row['email']; 
			$Password =$row['password'];
			$Contact=$row['contact'];
			$Birthday= $row['birthday']; 
			$Gender	=$row['gender'];
			$Passno=$row['passno'];
			$Registerby=$row['registerby']; 
			$Status=$row['status']; 
            $Photo=$row['photo']; 
		}
	}
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
			<label for="fullname"><b>Full Name</b></label>
			<input type="text" class="form-control" id="fullname"  placeholder="Enter Full Name" name="fullname" value="<?php if(isset($Fullname)){ echo $Fullname; } ?>" required>
		</div>
		<div class="form-group">
			<label for="firstname"><b>First Name</b></label>
			<input type="text" class="form-control" id="firstname" placeholder="Enter Name" name="firstname" value="<?php if(isset($Firstname)){ echo $Firstname; } ?>" required="@">
		</div>
		<div class="form-group">
			<label for="lastname"><b>Last Name</b></label>
			<input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname"  value="<?php if(isset($Lastname)){ echo $Lastname; } ?>" required>
        </div>
		<div class="form-group">
			<label for="email"><b>Email</b></label>
			<input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php if(isset($Email)){ echo $Email; } ?>" required>
        </div>
		<div class="form-group">
			<label for="password"><b>Password</b></label>
			<input type="password" class="form-control" id="password"  placeholder="Enter Password" name="password" value="<?php if(isset($Password)){ echo $Password; } ?>" required>
        </div>
		<div class="form-group">
			<label for="contact"><b>Contact</b></label>
			<input type="number" class="form-control" id="contact" placeholder="Enter Contact" name="contact" value="<?php if(isset($Contact)){ echo $Contact; } ?>" required>
		</div>
		<div class="form-group">
			<label for="birthday"><b>Birthday</b></label>
			<input type="date" class="form-control" id="birthday" placeholder="Enter Birthday" name="birthday" value="<?php if(isset($Birthday)){ echo $Birthday; } ?>" required>
		</div>
		<div class="form-group">
			<label for="gender"><b>Gender</b></label>
			<input type="text" class="form-control" id="gender"  placeholder="Enter Gender" name="gender" value="<?php if(isset($Gender)){ echo $Gender; } ?>" required>
		</div>
		<div class="form-group">
			<label for="passno"><b>Pass No</b></label>
			<input type="number" class="form-control" id="passno"  placeholder="Enter Passno" name="passno" value="<?php if(isset($Passno)){ echo $Passno; } ?>" required>
		</div>
		<div class="form-group">
			<label for="registerby"><b>Register by</b></label>
			<input type="text" class="form-control" id="registerby"  placeholder="Enter Registerby" name="registerby" value="<?php if(isset($Registerby)){ echo $Registerby; } ?>" required>
		</div>
		<div class="form-group">
			<label for="status"><b>Status</b></label>
			<input type="number" class="form-control" id="status"  placeholder="Enter Status" name="status" value="<?php if(isset($Status)){ echo $Status; } ?>" required>
		</div>
		<div class="form-group">
			<label for="file"><b>Image</b></label>
			</br>
            <img height="150" width="200" style="border-radius:50%" src="<?php if(isset($Photo)){ echo $Photo; } ?>">
            </br>
            </br>
			<input type="file" id="file" name="mfile" value="" required>

		</div>
		</br>
		<input type="hidden" name="<?php if(isset($id)){echo 'id';}?>" value="<?php if(isset($id)){echo $id;}?>"/>
		<div class="form-group">
			<input  type="submit"  id="login" value="Submit" class="btn btn-success"/>
			<a href="index.php"><input  type="submit"  id="login" value="Back" class="btn btn-secondary"/></a>
            <input  type="reset"   id="reset" value="Reset" class="btn btn-default"/>
		</div>
</form>
</div>
</body>
</html>
