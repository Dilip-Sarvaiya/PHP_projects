
<!DOCTYPE html>
<html>
<head>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script type='text/javascript'>
        $(document).ready(function(){
            $('#check').click(function(){
             //alert($(this).is(':checked'));
                $(this).is(':checked') ? $('#password').attr('type', 'text') : $('#password').attr('type', 'password');
            });
        });
 </script>
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
</head>
<title>Login Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>	
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="<?=base_url('Users/logout'); ?>">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</br>
<center><h1>Login Form</h1></center>

<div class="container">
<form action="<?=base_url('Users/validateUser'); ?>" method="post" id="form">	
		
		<?php if($this->session->flashdata('errno'))
		{?>
		<strong>
			<div class="form-group" style="color:red;">
			<?=$this->session->flashdata('message') ?>
			</div>
		</strong>
		<?php } ?>
			<?php if($this->session->flashdata('errno'))
		{?>
		<strong>
			<div class="form-group" style="color:green;">
			<?=$this->session->flashdata('reg_message') ?>
			</div>
		</strong>
		<?php } ?>
		<div class="form-group">
			<label for="uname"><b>Username</b></label>
			<input type="text" class="form-control"  id="username" placeholder="Enter Username" name="username" required>
		</div>
		<div class="form-group">
			<label for="psw"><b>Password</b></label>
			<input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
		</div>
        <div class="form-group">
            <input type='checkbox' id='check' />
			<label for="psw"><b>Show Password</b></label>
		</div>
		<div class="form-group">
			<a class="text-danger" href="<?=base_url('Users/signup'); ?>">Create a New Account</a>
		</div>
			<button type="btn" class="btn btn-success"  id="login">Login</button>
</form>
</div>
</body>
</html>
