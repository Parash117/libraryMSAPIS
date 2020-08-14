<?php

include('../dbconnection.php');

$size = $_POST['size'];
$pid = $_POST['sidforimage'];
$flag = 0;
// Path to move uploaded files
$target_path = dirname(__FILE__).'/uploads/'.$pid.'/';

if (!file_exists($target_path)) {
    mkdir($target_path, 0777, true);
}

if (!empty($_FILES)) {
    for ($x = 0; $x < $size; $x++) {
        try {
            $newname = date('YmdHis',time()).mt_rand().'.jpg';

            // Throws exception incase file is not being moved
            if (!compressImage($_FILES['image'.$x]['tmp_name'], $target_path.$newname, 25)) {
                
                // make error flag true
                echo json_encode(array('status'=>'fail', 'message'=>'could not move file'));
            }   
                if($flag == 0){
                    insertMainImage($newname,$pid);
                    $flag = 1;
                }
                resizeImage($target_path.$newname, $target_path.$newname);
                //compressImage($_FILES['image'.$x]['tmp_name'], $target_path.$newname, 60);
                $link = '/LibMS/upload-files/uploads/'.$pid.'/'.$newname;
                $link = mysqli_real_escape_string($conn, $link);
                $sql = "INSERT INTO product_images (image_name, pid)VALUES('$link',$pid)";
                if(mysqli_query($conn,$sql)){

                }
            // File successfully uploaded
            echo json_encode(array('status'=>'success', 'message'=>'File Uploaded'));
        } catch (Exception $e) {
            // Exception occurred. Make error flag true
            echo json_encode(array('status'=>'fail', 'message'=>$e->getMessage()));
        }
    }
} else {
    // File parameter is missing
    echo json_encode(array('status'=>'fail', 'message'=>'Not received any file'));
}
// Compress image
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);

  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);
  return 1;
}

function resizeImage($filename,$target_newfile){
//$fn = $_FILES['image']['tmp_name'];
$fn = $filename;
$size = getimagesize($fn);
$ratio = $size[0]/$size[1]; // width/height
if( $ratio > 1) {
    $width = 1000;
    $height = 1000/$ratio;
}
else {
    $width = 1000*$ratio;
    $height = 1000;
}
$src = imagecreatefromstring(file_get_contents($fn));
$dst = imagecreatetruecolor($width,$height);
imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
imagedestroy($src);
imagejpeg($dst,$target_newfile); // adjust format as needed
imagedestroy($dst);

}

    
    function insertMainImage($filename,$pid){
        include('../dbconnection.php');
        $link = '/LibMS/upload-files/uploads/'.$pid.'/'.$filename;
        $link = mysqli_real_escape_string($conn, $link);
        $sql = "UPDATE products SET primary_photo='$link' where pid='$pid'";
        if(mysqli_query($conn,$sql)){
            echo "Success";
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    $conn->close();
?>