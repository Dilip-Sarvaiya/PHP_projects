<?php
	include("db/connect.php");
	$sql="SELECT departments.DEPARTMENT_ID,departments.DEPARTMENT_NAME,departments.MANAGER_ID,employees.FIRST_NAME 
	FROM departments 
	INNER JOIN employees 
	ON departments.MANAGER_ID =employees.EMPLOYEE_ID";
	$result=$db->query($sql);
	
	$sql1="SELECT DEPARTMENT_NAME,
	COUNT(*) 
	FROM departments 
	INNER JOIN employees 
	ON employees.DEPARTMENT_ID = departments.DEPARTMENT_ID 
	GROUP BY departments.DEPARTMENT_ID, DEPARTMENT_NAME 
	ORDER BY DEPARTMENT_NAME";
	$result1=$db->query($sql1);
?>
<html>
<head>
<link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<title>Display Records </title>
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
    </ul>
    <form action="" class="form-inline" method="post">
      <input class="form-control" name="search" type="text" placeholder="Search">
      <button class="btn btn-secondary" >Submit</button>
    </form>
  </div>
</nav>
</br>
<div class="container">
<table class="table table-hover">
  <thead>
    <tr class="table-info">
	   <th scope="col">department_id</th>
       <th scope="col">department_name</th>
       <th scope="col">manager_id</th>
       <th scope="col">first_name</th>
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
			      <th scope="row"><?php echo $row['DEPARTMENT_ID']; ?></th>
			      <td><?php echo $row['DEPARTMENT_NAME']; ?></td>
			      <td><?php echo $row['MANAGER_ID']; ?></td>
			      <td><?php echo $row['FIRST_NAME']; ?></td>
			    </tr>
				<?php
					}
				}
			?>
</table>
<table class="table table-hover">
  <thead>
    <tr class="table-info">
	   <th scope="col">Department Name</th>
       <th scope="col">No of Employees </th>
    </tr>
  </thead>
  <tbody>
 	 <?php
	if($result1->num_rows)
	{
		while($row=$result1->fetch_assoc())
		{	
			?>	
		    <tr class="table-default">
		      <th scope="row"><?php echo $row['DEPARTMENT_NAME']; ?></th>
		      <td><?php echo $row['COUNT(*)']; ?></td>
		    </tr>
			<?php
		}
	}
?>
</tbody>
</table>
</div>
</html>