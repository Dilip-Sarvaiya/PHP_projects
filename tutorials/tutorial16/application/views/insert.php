<?php
?>
<html>
<head>
<meta charset="utf-8">
<title>Insert New Record</title>
	<link rel="stylesheet"  href="<?=base_url(); ?>assets/css/bootstrap.min.css"/>
	<script src="jquery.min.js"></script>
</head>
<body>
<div class="container">
<form action="<?=base_url("Student/insert");?>" method="POST" id="frm" name="Login_Form" enctype="multipart/form-data">
		<input value="<?php if(isset($member['id'])){echo $member['id'];}?>" name="id" type="hidden"/>
		
		<div class="form-group">
			<label for="firstname"><b>First Name</b></label>
			<input type="text" class="form-control" id="firstname" placeholder="Enter Name" name="firstname" value="<?php if(isset($member['id'])){echo $member['firstname'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('firstname','&#128712'); ?>
			</div>
		<div class="form-group">
			<label for="lastname"><b>Last Name</b></label>
			<input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname"  value="<?php if(isset($member['id'])){echo $member['lastname'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('lastname','&#128712'); ?>
			</div>	
			
		<div class="form-group">
			<label for="email"><b>Email</b></label>
			<input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php if(isset($member['id'])){echo $member['email'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('email','&#128712'); ?>
			</div>
		</div>
		<div class="form-group">
			<label for="password"><b>Password</b></label>
			<input type="password" class="form-control" id="password"  placeholder="Enter Password" name="password" value="<?php if(isset($member['id'])){echo $member['password'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('password','&#128712'); ?>
			</div>	
		</div>
		<div class="form-group">	
			<label for="password"><b>Re-Password</b></label>
			<input type="password" class="form-control" id="password"  placeholder="Enter Re-Password" name="repassword" value="<?php if(isset($member['id'])){echo $member['password'];}?>" />
			<div style="color:red;">		
					<?php echo form_error('repassword','&#128712'); ?>
			</div>		
		</div>
		<div class="form-group">
			<label for="contact"><b>Contact</b></label>
			<input type="text" class="form-control" id="contact" placeholder="Enter Contact" name="contact" value="<?php if(isset($member['id'])){echo $member['contact'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('contact','&#128712'); ?>
			</div>		
		</div>
		<div class="form-group">
			<label for="contact"><b>Birthdate</b></label>
			<input type="date" class="form-control" id="birthday" placeholder="Enter Date" name="birthday" value="<?php if(isset($member['id'])){echo $member['birthday'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('birthday','&#128712'); ?>
			</div>		
		</div>
		<div class="form-group">
			<label for="gender"><b>Gender</b></label>
			<input type="text" class="form-control" id="gender"  placeholder="Enter Gender" name="gender" value="<?php if(isset($member['id'])){echo $member['gender'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('gender','&#128712'); ?>
			</div>	
		</div>
		<div class="form-group">
			<label for="gender"><b>Pass no</b></label>
			<input type="number" class="form-control" id="gender"  placeholder="Enter Passno" name="passno" value="<?php if(isset($member['id'])){echo $member['passno'];}?>" >
			<div style="color:red;">		
					<?php echo form_error('passno','&#128712'); ?>
			</div>	
		</div>
	 <div class="form-group">
		  <label for="registerby">Register by</label>
		  <select class="form-control" id="registerby" value="<?php if(isset($member['id'])){echo $member['registerby'];}?>" name="registerby">
			<option value="Regular" <?php if(isset($member['id'])){echo $member['registerby'];}{echo "selected"; }?> >Regular</option>
			<option value="Un-regular" <?php if(isset($member['id'])){echo $member['registerby'];}{echo "selected"; }?>>Un-Regular</option>
		  </select>
		</div>
			<div style="color:red;">		
					<?php echo form_error('registerby','&#128712'); ?>
			</div>	
		</div>
		 <div class="form-group">
		  <label for="satus">Status</label>
		  <select class="form-control" id="status" value="<?php if(isset($member['id'])){echo $member['status'];}?>" name="status">
			<option value=0 value="<?php if(isset($member['id'])){echo $member['status'];}{echo "selected"; }?>" >0</option>
			<option value=1 value="<?php if(isset($member['id'])){echo $member['status'];}{echo "selected"; }?>" >1</option>
		  </select>
		</div>
			<div style="color:red;">		
					<?php echo form_error('status','&#128712'); ?>
			</div>	
		<div class="form-group">
			<label for="photo"><b>Photo</b></label>
			</br>
			<?php if(isset($member['id'])){?><img style='border-radius:50%' height="100" width="120"  src="<?=base_url('assets/uploads/').$member['photo']; ?>"><?php } else { echo "";}?>
			<input type="file" class="form-control" id="photo" name="photo" value="" >
		</div>
		<div class="form-group">
			<?php
			if(isset($member['id'])==0){
				?>
			<input  type="submit"  id="login" value="Submit" class="btn btn-success"/>
			<?php }else{ ?>	
				<input  type="submit"  id="login" value="Update" class="btn btn-success"/>
			<?php } ?>
			<a href="<?=base_url('Student'); ?>"><button type="button" class="btn btn-primary">Back</button></a>
            <input  type="reset"   id="reset" value="Reset" class="btn btn-default"/>
		</div>
</form>
</div>
</body>
</html>
