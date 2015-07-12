<?php

header('Access-Control-Allow-Origin: *');
include ("db_head.php");

if(isset($_GET['first_name'],$_GET['last_name'],$_GET['email'],$_GET['pass'],$_GET['uuid']))
{
	if(!empty($_GET['first_name']) && !empty($_GET['last_name']) && !empty($_GET['email']) && !empty($_GET['pass']) && !empty($_GET['uuid']))
	{
		 $first_name=$_GET['first_name'];
		 $last_name=$_GET['last_name'];
		$email=$_GET['email'];
		 $pass=$_GET['pass'];
		 $reg_uuid=$_GET['uuid'];
		 $query=mysql_query("INSERT INTO `users` VALUES('','$first_name','$last_name','$email','$reg_uuid','')") or print_r(mysql_error());
		 $insert_id=mysql_insert_id();
		 if(!empty($insert_id))
		 {
			 echo 'profile updated and all good!';
		 }
	}
}


?>