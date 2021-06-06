
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
<style>
.alert{
	color:red;
}
</style>
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
<center><h1>Sign up
 Form</h1></center>

<div class="container">
<form action="<?=base_url('Users/save_registration'); ?>" method="post" id="form">	
		
		<div class="alert">
			<?php echo validation_errors(); ?>
		</div>
		<div class="form-group">
			<label for="uname"><b>Username</b></label>
			<input type="text" class="form-control" value="" id="username" placeholder="Enter Username" name="username" >
		</div>
		<div class="form-group">
			<label for="psw"><b>Password</b></label>
			<input type="password" class="form-control" value="" id="password" placeholder="Enter Password" name="password" >
		</div>
		<div class="form-group">
			<label for="psw"><b>Re-Password</b></label>
			<input type="password" class="form-control" value="" id="password" placeholder="Enter Password" name="passwordc" >
		</div>
			<button type="btn" class="btn btn-success"  id="login">Create</button>
</form>
</div>
</body>
</html>
