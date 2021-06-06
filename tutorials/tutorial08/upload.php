<?php
if(isset($_FILES['myfile']))
{
	$ftmp=$_FILES['myfile']['tmp_name'];
	$path="upload/".$_FILES['myfile']['name'];
	echo "File name is: ".$ftmp;
	?>
	</br>
	<?php
	echo "Path of File is: ".$path;
	?>
	</br>
	<?php
	$size=$_FILES['myfile']['size'];
	$type=$_FILES['myfile']['type'];
	echo "Size of File is: ".$size;
	?>
	</br>
	<?php
	echo "Type of File is: ".$type;
		if($size<5000*1024)
		{
			if(isset($_FILES['myfile']))
			{
				if(file_exists($path))
				{
						?>
						</br>
						<?php
						echo "File already exist..";
				}
				else
				{
					move_uploaded_file($ftmp,$path);
					
					echo "<img height='250' width='300' style='border-radius:50%;' src='$path'/>";
					?>
					</br>
					<?php
					echo "Uploaded";
				}
			}
			else
			{
				echo "Not upload..";
			}
		}
}
	else
	{
		?>
		</br>
		<?php
		echo "Please Upload less then 5 mb file";
	}
?>
<html>
<title>File Information</title>
</html>