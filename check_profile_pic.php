<?php
header('Access-Control-Allow-Origin: *');
include ("db_head.php");


if(isset($_GET['uuid']))
{
	if(!empty($_GET['uuid']))
	{
		$uuid=$_GET['uuid'];
				$query=mysql_query("SELECT `profile_pic` FROM `users` WHERE `uuid`='$uuid' ");
				$result=mysql_fetch_assoc($query);
				if($result)
				{
					echo 'true';
				}else
				{
					echo 'false';
				}
	}
}


?>