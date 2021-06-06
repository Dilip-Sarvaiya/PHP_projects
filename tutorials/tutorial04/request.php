<?php
	$principal = $_GET['principal'];
	$rate = $_GET['rate'];
	$time = $_GET['nom'];
	$total = ($principal*$rate*$time)/100;
?>
<html>
<title>Interest Data</title>
	<head>
	
  <link rel="stylesheet" href="css\bootstrap.min.css">

	</head>
<body>
	<div class="well">
		<div class="container"> 
			<form action="request.php">
			<h1>Simple Interest Data</h1>
			 
				<div class="form-group">
					 <label for="int">Principal Amount: <?php echo $principal; ?></label>
				</div>
			 
				<div class="form-group">
					<label for="interest" >Rate of Interest: <?php echo $rate; ?></label>
				</div>
			
				<div class="form-group">
					<label for="year" >Time of Interest: <?php echo $time; ?></label>
				</div>
		 
				<div class="form-group">
					<label for="calculate" >Simple Interest is: <?php echo $total; ?></label>
				</div>
		
			</form>
		</div>
	</div>
</body>
</html>