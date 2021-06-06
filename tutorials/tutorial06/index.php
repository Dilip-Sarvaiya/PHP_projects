<?php
    session_start();
    
    if($_SESSION['username'] == "" && $_SESSION['password'] == "")
    {
      header("Location:login.php");
    }
?>

<html>
<body>
<head>
    <title>Information Table</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js\jquery.min.js"></script>
<link rel="stylesheet" href="css\bootstrap.min.css">
<script>
	$("document").ready(function(){
		$(".btn-danger").click(function(){
			$(this).closest('tr').fadeOut(
				1000,
				function(){
					$(this).remove();
				});
			});
		});
</script>
<style>
#button{
    float:right;
    display:block;
    margin-right:0px;
    clear:left;
	margin:5px;
}
h1 {
  text-shadow: 2px 2px #99ff66;
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 5px solid #ff3030;
  outline: 8px  yellow;
}
th, td {
  text-align: left;
  padding: 15px;
  font-size:18px;
  background-repeat:no-repeat;
  font-family:Cambria Math;
 outline: 2px double green;
  border: 1px solid yellow;
  outline-style: double;
  outline-color: blue;
}

tr:nth-child(even){background-color: #fef700fa}
tr:nth-child(odd){background-color: #1cfc6c}
</style>
<div class="container">
<h1 class="text-center">Information Table</h1>
<div class="priviouslink">
<a href="logout.php"><button class="btn btn-danger" id="button">Log Out</button></a>
<button class="btn btn-primary" id="button">Add New Data</button>
</div>
	<table class="table table-stripped" "table table-bordered">
	<tr>
		<td>No.</td>
		<td>Name</td>
		<td>Email</td>
		<td>Age </td>
		<td>State</td>
		<td>City</td>
		<td>Department</td>
		<td>Action</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Nayan Chauhan</td>
		<td>nayanchauhan121@gmail.com</td>
		<td>19</td>
		<td>Gujarat</td>
		<td>Jasdan</td>
		<td>Engineering</td>
		<td>
		<button type="button" class="btn btn-primary">Edit</button>
		<button type="button" class="btn btn-danger">Delete</button>	
		</td>
	</tr>
	<tr>
		<td>2</td>
		<td>Mayank Desai</td>
		<td>mayankdesai222@gmail.com</td>
		<td>22</td>
		<td>Maharashtra</td>
		<td>Pune</td>
		<td>Pharmacy</td>
		<td>
		<button type="button" class="btn btn-primary">Edit</button>
		<button type="button" class="btn btn-danger">Delete</button>
		</td>
	</tr>
	<tr>
		<td>3</td>
		<td>Vimal Parmar</td>
		<td>vimalparmar442@gmail.com</td>
		<td>21 </td>
		<td>Rajasthan</td>
		<td>Udaipur</td>
		<td>Agriculture</td>
		<td>
		<button type="button" class="btn btn-primary">Edit</button>
		<button type="button" class="btn btn-danger">Delete</button>
		</td>
	</tr>
	<tr>
		<td>4</td>
		<td>Harsh Sharma</td>
		<td>harshsharma141@gmail.com</td>
		<td>19 </td>
		<td>Tamilnadu</td>
		<td>Madurai</td>
		<td>Engineering</td>
		<td>
		<button type="button" class="btn btn-primary">Edit</button>
		<button type="button" class="btn btn-danger">Delete</button>
		</td>
	</tr>
	</table>
</div>
</body>
</html>
	