<?php
?>
<html>
<head>
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"/>
<link rel="stylesheet"  href="<?php echo base_url(); ?>assets/css/bootstrap.css"/>

</head>
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
				<a class="nav-link" href="<?=base_url('Users/logout')?>">Logout</a>
	    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</br>
<div class="container">
	<div class="row">
		<div class="col-lg-10">
			<h2>Members Details</h2>
		</div>
		<div class="col-lg-2">
			<a href="<?=base_url("Student/form");?>"><button type="button" class="btn btn-success">Add New Record</button></a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<table class="table table-hover">
			  <thead>
				<tr>
				  <th scope="col">No</th>
				  <th scope="col">Full Name</th>
				  <th scope="col">First Name</th>
				  <th scope="col">Last Name</th>
				  <th scope="col">Email</th>
				  <th scope="col">Password</th>
				  <th scope="col">Contact</th>
				  <th scope="col">Birthdate</th>
				  <th scope="col">Gender</th>	
				  <th scope="col">Pass no</th>
				  <th scope="col">Register by</th>
				  <th scope="col">Status</th>
				   <th scope="col">Photo</th>	
				  <th scope="col">TimeStemp</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody>
			<?php
				foreach ($h->result() as $row)
				{
					?>
					<tr>
					<td><?php echo $row->id ; ?></td>
					<td><?php echo $row->firstname." ".$row->lastname; ?></td>
					<td><?php echo $row->firstname; ?></td>
					<td><?php echo $row->lastname; ?></td>
					<td><?php echo $row->email; ?></td>
					<td><?php echo $row->password; ?></td>
					<td><?php echo $row->contact; ?></td>
					<td><?php echo $row->birthday; ?></td>
					<td><?php echo $row->gender; ?></td>
					<td><?php echo $row->passno; ?></td>
					<td><?php echo $row->registerby; ?></td>
					<td><?php echo $row->status; ?></td>
					<td><img src="<?=base_url("assets/uploads/").$row->photo?>"  style='border-radius:50%' height="100" width="120" ></td>
					<td><?php echo $row->timestemp; ?></td>
					<td>
						<a href="<?php echo base_url('Student/form/').$row->id;?>"><span class="badge badge-pill badge-primary">Edit</span></a>
						<a href="<?php echo base_url('Student/delete/').$row->id;?>"><span class="badge badge-pill badge-danger" onClick="return confirm('Do you want to delete?');">Delete</span></a>
					</td>
					</tr>
					<?php
				}
				?>
			</tbody>
			</table>
		</div>
</div>
</div>
</html>