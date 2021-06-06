<?php
	include("db/connect.php");
	
	$sql= "select * from members";
	
	$result=$db->query($sql);
		
?>
<title>Database Connection</title>		
		<ul>
			<?php
				if($result->num_rows)
				{
						while($row=$result->fetch_assoc()){
							?>
							<li><?php echo $row['fullname'];?> </li>
							<li><?php echo $row['password'];?></li>
							<?php
						}
				}
			?>
		</ul>
