<?php
	include("db/connect.php");
	$sql="select * from members";
	$result=$db->query($sql);
?>
<html>
<head>
<style>
#btn
{
	float:right;
}
</style>
<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<title>Display Records</title>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
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
    </ul>
    </div>	
    <form action="" class="form-inline" method="post">
      <input class="form-control" name="search" type="text" placeholder="Search">
      <button class="btn btn-secondary" >Submit</button>
    </form>
</nav>
</br>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<h1 class="text-primary">Members Detail</h1>
		</div>
		<div class="col-lg-2">
			<a href=""><button type="button" id="btn" class="btn btn-success">Add New Record</button></a>
		</div>
			</br>
			</br>
	</div>
<div class="form-group">
<table class="table table-hover">
  <thead>
    <tr class="table-info">
      <th scope="col">Id</th>
       <th scope="col">Full Name</th>
       <th scope="col">First Name</th>
       <th scope="col">Last Name</th>
	   <th scope="col">Email</th>
	   <th scope="col">Password</th>
	   <th scope="col">Contact</th>
	   <th scope="col">Birthday</th>
		<th scope="col">Gender</th>
		<th scope="col">Passno</th>
		<th scope="col">Registerby</th>
		<th scope="col">Status</th>
		<th scope="col">Photo</th>
		<th scope="col">Timestemp</th>
		<th scope="col">Action</th>
	</tr>
  </thead>
  <tbody>
  <?php
	if($result->num_rows)
	{
		while($row=$result->fetch_assoc())
		{	
		?>	
    <tr class="table-default">
       <th scope="row"><?php echo $row['id']; ?></th>
		<td><?php echo $row['fullname']; ?></td>
		<td><?php echo $row['firstname']; ?></td>
		<td><?php echo $row['lastname']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['password']; ?></td>
		<td><?php echo $row['contact']; ?></td>
		 <td><?php echo $row['birthday']; ?></td>
		<td><?php echo $row['gender']; ?></td>
		<td><?php echo $row['passno']; ?></td>
		 <td><?php echo $row['registerby']; ?></td>
		<td><?php echo $row['status']; ?></td>
		<td><img style='border-radius:50%' height="100" width="120" src="<?php echo $row['photo']; ?>"></td>
		<td><?php echo $row['timestemp']; ?></td>
	  <td>
			<a href=""><button type="button" class="btn btn-info">Edit</button></a>
			<a href=""><button type="button" class="btn btn-danger" >Delete</button></a>
	  </td>
    </tr>
	<?php
		}
	}
?>
</table>
</div>
</div>
</body>
</html>