<?php
	$db=new mysqli("sql101.epizy.com","epiz_25903873","DILIP879600","epiz_25903873_clubuvdb");
	if($db->connect_errno)
	{
		echo $db->connect_error;
	}
?>