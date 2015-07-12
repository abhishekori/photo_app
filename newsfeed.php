
<style type="text/css">
                        body {
                                background-color:#f0f0ee;
                                font:1em "Trebuchet MS";
                        }
                        .clearfix:after {
                                visibility:hidden;
                                display:block;
                                font-size:0;
                                content: ".";
                                clear:both;
                                height:0;
                                line-height:
                        }
                        .clearfix {
                                display: inline-block;
                        }
                        * html .clearfix {
                                height: 1%;
                        }
                        .bubble-list .bubble img {
                               
                                width:70px;
                                height:70px;
                                border:3px solid #ffffff;
                                border-radius:10px

                        }
                        .bubble-content {
                                position:relative;
                                
                                
                                padding:0px 20px;
                                border-radius:10px;
                                background-color:#FFFFFF;
                                box-shadow:1px 1px 5px rgba(0,0,0,.2);
								
								
                        }

                        .bubble {
                                margin-top:20px;
								width:100%;
								
								
								
                        }
                        .point {
                                border-top:10px solid transparent;
                                border-bottom:10px solid transparent;
                                border-right: 12px solid #FFF;
                                position:absolute;
                                left:-10px;
                                top:12px;
                        } 
                </style>
<?php
header('Access-Control-Allow-Origin: *');
include ("db_head.php");
$test_url="http://app.imgsea.com/classmate/uploads/";
if($_POST['count'])
{
	if(!empty($_POST['count']))
	{
		$count=$_POST['count']-1;
			$query=mysql_query("SELECT *
FROM `posts`
INNER JOIN `users`
ON posts.uuid=users.uuid ORDER BY post_id DESC  LIMIT $count,5") or print_r(mysql_error());
while($result=mysql_fetch_assoc($query))
{
	
	//$img_url="http://myfbapp.hostoi.com/email/uploads/".$result['imgname'];
	?>
	<div class='bubble-list'>
                        <div class='bubble clearfix'>
                                
                                <div class='bubble-content'>
                                       
                                        <table  width="100%">
										<tr>
										<td rowspan='2' width="50"><img src='<?php echo $test_url.$result['profile_pic']; ?>'  width="50" height="50"/></a></td><td><p><?php echo $result['first_name']."   ".$result['last_name'];?></p></td>
										</tr>
										<tr><td style="color:#999999;"><?php echo date("F j, Y   g:i a",$result['date'])."<br><br>"; ?></td>
</tr>
										<?php if(!empty($result['post']))
										{
										?>
										<tr>
										<td colspan="2"><?php echo $result['post']."<br><br>"; ?></td>
										</tr>
<br />

                                        
                                        <?php
										}
										?>
										<?php if(!empty($result['img_name']))
										{?>
											<tr>
                                            <td colspan="2">
                                             <center><a href="<?php echo $test_url.$result['img_name']; ?>" download="myimage"><img src='<?php echo $test_url.$result['img_name']; ?>'  style="max-width:100%; height:auto; width:100%"/></a><br />
<br />


                                             
          <input type="text" value="<?php echo $test_url.$result['img_name']; ?>" readonly="readonly"   size="100%"/><br />
<br />

                                            </center>
                                            </td></tr>
                                            
											<?php }?></table> </div>
	<!--//echo $result['post_id']."  ".$result['first_name']."  ".$result['post']."<br>";-->

<?php
}
//echo $count;

	}
}



?>