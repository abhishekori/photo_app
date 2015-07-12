<?php
header('Access-Control-Allow-Origin: *');
include ("db_head.php");
if(isset($_GET['post'],$_GET['uuid']))
{
	if(!empty($_GET['post']) && !empty($_GET['uuid']))
	{
	$post=$_GET['post']."<br>";
	$uuid=$_GET['uuid']	;
	$query=mysql_query("INSERT INTO `posts` VALUES('','$uuid','$post',UNIX_TIMESTAMP(),'')") or print_r(mysql_error());
	if($query)
	{
		echo 'posted';
	}
	else
	{
		echo 'some data base error';
	}
}
	else
	{
		echo 'empty';
	}
}
else
{
	echo 'not set';
}



?>