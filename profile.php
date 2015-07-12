<?php
header('Access-Control-Allow-Origin: *');
include ("db_head.php");
$test_url="http://app.imgsea.com/classmate/uploads/";
if(isset($_GET['uuid']))
{
	if(!empty($_GET['uuid']))
	{
		
		$uuid=$_GET['uuid'];
		$query=mysql_query("SELECT * FROM `users` WHERE `uuid`='$uuid'");
		
		
		$row=mysql_fetch_assoc($query)
		
			?>
            <center>
            <table border="1" style="width:100%; max-width:100%; height:auto;">
            <tr>
            <td align="center"><img src="<?php echo $test_url.$row['profile_pic']?>" width="200" height="200" align="middle"/> </td>
            </tr>
            <tr>
            <td align="center">Name: <?php echo $row['first_name']."  ".$row['last_name'];?></td>
            </tr>
            
            <tr>
            <td align="center">Email: <a href='mailto:<?php echo $row['email']; ?>'><?php echo $row['email'];?></a></td>
            
            </table>
            </center>
            <?php
			}
	}

else
{
	echo 'uuid not set';
}


?>