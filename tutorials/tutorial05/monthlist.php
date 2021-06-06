<?php
	$monthno=$_GET['month'];
?>
<html>
<head>
    <title>Months Name</title>
	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script>
</script>
</head>
<div class="container">
<form action="monthlist.php" method="GET">
<h1 class="text-info">Month No is: <?php echo $monthno; ?></h1>
	<div class="form-group"  >
		<select id="month" name="month" class="form-control" required>
			<option <?php if($monthno==1) echo "selected" ?>>January</option>
			<option <?php if($monthno==2) echo "selected" ?>>Febuary</option>
			<option <?php if($monthno==3) echo "selected" ?>>March</option>
			<option <?php if($monthno==4) echo "selected" ?>>April</option>
			<option <?php if($monthno==5) echo "selected" ?>>May</option>
			<option <?php if($monthno==6) echo "selected" ?>>June</option>
			<option <?php if($monthno==7) echo "selected" ?>>July</option>
			<option <?php if($monthno==8) echo "selected" ?>>August</option>
			<option <?php if($monthno==9) echo "selected" ?>>September</option>
			<option <?php if($monthno==10) echo "selected" ?>>October</option>
			<option <?php if($monthno==11) echo "selected" ?>>November</option>
			<option <?php if($monthno==12) echo "selected" ?>>December</option>
		</select>
		
	</div>
        <center><a href="month.html"><button type="button" id="done" class="btn btn-primary btn-lg" >Done</button></a></center>
    </form>
</div>
</body>
</html>