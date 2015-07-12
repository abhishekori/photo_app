<?php
header('Access-Control-Allow-Origin: *');
include ("db_head.php");
// Directory where uploaded images are saved
$dirname = "uploads"; 

if(isset($_GET['uuid'],$_GET['file_name']))
{
	if( !empty($_GET['uuid']) && !empty($_GET['file_name']))
	{
		$desc=$_GET['desc'];
		$uuid=$_GET['uuid'];
		$file_name=$_GET['file_name'].".jpg";
		$query=mysql_query("INSERT INTO `posts` VALUES('','$uuid','$desc',UNIX_TIMESTAMP(),'$file_name')") or print_r(mysql_error());
		
	}
	else
	{
		echo 'variables empty';
	}

}
else
{
	echo "not set";
}
// If uploading file
if ($_FILES) {
    print_r($_FILES);
	

    move_uploaded_file($_FILES["file"]["tmp_name"],$dirname."/".$_FILES["file"]["name"].".jpg");
}

/*// If retrieving an image
else if (isset($_GET['image'])) {
    $file = $dirname."/".$_GET['image'];

    // Specify as jpeg
    header('Content-type: image/jpeg');
  
    // Resize image for mobile
    list($width, $height) = getimagesize($file); 
    $newWidth = 120.0; 
    $size = $newWidth / $width;
    $newHeight = $height * $size; 
    $resizedImage = imagecreatetruecolor($newWidth, $newHeight); 
    $image = imagecreatefromjpeg($file); 
    imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height); 
    imagejpeg($resizedImage, null, 80); 
}
*/
// If displaying images
/*else {
    $baseURI = "http://".$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    $images = scandir($dirname);
    $ignore = Array(".", "..");
    if ($images) {
        foreach($images as $curimg){ 
            if (!in_array($curimg, $ignore)) {
                echo "Image: ".$curimg."<br>";
                echo "<img src='".$baseURI."?image=".$curimg."&rnd=".uniqid()."'><br>"; 
            }
        }
    }
    else {
        echo "No images on server";
    }
}*/
?>