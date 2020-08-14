<?php

//$fn = $_FILES['image']['tmp_name'];
$fn = 'C:\xampp\htdocs\maremare\upload-files\uploads\45\20200229150233241827400.jpg';
$size = getimagesize($fn);
$ratio = $size[0]/$size[1]; // width/height
if( $ratio > 1) {
    $width = 900;
    $height = 900/$ratio;
}
else {
    $width = 900*$ratio;
    $height = 900;
}
$src = imagecreatefromstring(file_get_contents($fn));
$dst = imagecreatetruecolor($width,$height);
imagecopyresampled($dst,$src,0,0,0,0,$width,$height,$size[0],$size[1]);
imagedestroy($src);
imagejpeg($dst,'asdnaskdn.jpg'); // adjust format as needed
imagedestroy($dst);

?>