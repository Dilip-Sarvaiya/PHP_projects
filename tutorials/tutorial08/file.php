<?php
?>
<html>
<head>
<title>Tutorial-8</title>
<link rel="stylesheet" href="js/bootstrap.min.css">
<div class="container">
<form action="registration.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<h1 class="text-primary">Select File </h1>
</div>
<div class="form group">
<input type="file" name="myfile" />
</div>
</br>
<div class="form-group">
Note:<strong>Selected file must be less than 5 MB</strong>
</div>
<div class="form group">
<input type="submit" class="btn btn-primary"  value="Submit">
</div>
</form>
</div>
</head>
</html>