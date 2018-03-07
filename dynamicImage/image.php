<?php
// Set the content-type
header('Content-Type: image/png');

$string = file_get_contents("data.json");
$json = json_decode($string, true);

$day = date("l"); // Get Day Name
$title = $json[0][$day][0]['title']; // Get Title with Day Name
$dateText = date("l, j F Y"); // Date Text

$canvasWidth = "700";
$canvasHeight = "200";

// Create the image
$im = imagecreatetruecolor($canvasWidth, $canvasHeight);

$fontBold = 'font/Bold.ttf';
$fontRegular = 'font/Regular.ttf';

// Text Color with RGB
$dark = imagecolorallocate($im, 67, 67, 67);

$backgroundPath = 'background.png';
$background = imagecreatefrompng($backgroundPath);

$backgroundWidth = "700";
$backgroundHeight = "200";

imagecopy($im, $background, 0, 0, 0, 0, $backgroundWidth, $backgroundHeight);

///////////////////////
///Push Date
///////////////////////

$fontSize = 12;
$positionFromLeft = "200";
$positionFromTop = "90";

imagettftext($im, $fontSize, 0, $positionFromLeft, $positionFromTop, $dark, $fontRegular, $dateText);


///////////////////////
///Push Title
///////////////////////

$fontSize = 11;
$positionFromLeft = "200";
$positionFromTop = "115";

imagettftext($im, $fontSize, 0, $positionFromLeft, $positionFromTop, $dark, $fontBold, $title);


// Generate Image
imagepng($im);
imagedestroy($im);