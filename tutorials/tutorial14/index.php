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
     <?php
		if(isset($_POST['search']))
		{	
			$searchkey  =$_POST['search'];
            $sql="select * from members WHERE firstname LIKE '%$searchkey%' or lastname LIKE '%$searchkey%' or fullname LIKE '%$searchkey%' or email LIKE '%$searchkey%'                                       or contact LIKE '%$searchkey%' or birthday LIKE '%$searchkey%' or gender LIKE '%$searchkey%' or passno LIKE '%$searchkey%' or registerby LIKE '%$searchkey%'
                  or status LIKE '%$searchkey%' or timestemp LIKE '%$searchkey%'";
		}
		else
		{
			$sql="select * from members";
			$searchkey="";
		}
	
		$result=$db->query($sql);
	?>
    <form action="" class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" name="search" type="text" value="<?php echo $searchkey; ?>" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" >Submit</button>
    </form>
  </div>
</nav>
</br>
<body id="tt">
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
    else
	{
		echo "<strong style='color:red'>* There is no result found</strong>";
	}
?>
</table>
</div>
</div>
</html>