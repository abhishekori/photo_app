<?php

header('Access-Control-Allow-Origin: *');
include ("db_head.php");


if(isset($_GET['uuid']))
{
	if(!empty($_GET['uuid']))
	{
		$uuid=$_GET['uuid'];
		$u_query=mysql_query("SELECT * 
FROM  `users` 
WHERE  `uuid` =  '$uuid'") or print_r(mysql_error());
		$result=mysql_fetch_assoc($u_query);
		if(!empty($result))
		{
		  echo 'true';
		}
		else
		{
			echo 'false';
		}
	}
	
}


?>
