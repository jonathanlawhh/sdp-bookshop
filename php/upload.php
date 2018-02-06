<?php
$myfiles = scandir('../books/cover');

print_r($myfiles);
foreach($myfiles as $file) {
  $sourcePath = "../books/cover/$file";
  $destPath = "../books/thumbnail/$file";
  $srcimage = imagecreatefrompng($sourcePath);
  list($width, $height) = getimagesize($sourcePath);
  $img = imagecreatetruecolor($width, $height);
  $bga = imagecolorallocatealpha($img, 0, 0, 0, 127);
  imagecolortransparent($img, $bga);
  imagefill($img, 0, 0, $bga);
  imagecopy($img, $srcimage, 0, 0, 0, 0, $width, $height);
  imagetruecolortopalette($img, false, 255);
  imagesavealpha($img, true);
  imagepng($img, $destPath);
  imagedestroy($img);
  echo $sourcePath . "<br />";
}
  ?>
