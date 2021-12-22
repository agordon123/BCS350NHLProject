<?php
// image_resize.php - Proportionally resize an image to fit into a smaller area
// Written by: Charles Kaplan, November 2019

// Inputs
// $pix - image location, directory and filename
// $width - new area width
// $height - new area height

// Outputs (Array with 2 elements)
// 1 - New Width
// 2 - New Height

function image_resize($pix, $width, $height) {
	$neww = $width;
	$newh = $height;
    $size = getimagesize($pix);
    if ($size[0] == 0)	$neww = $width; 	else $neww = $size[0];
	if ($size[1] == 0)  $newh = $height; 	else $newh = $size[1];
	$ratio = $neww/$newh;
    if ($neww > $width) {
		$neww = $width; 
		$newh = round($neww / $ratio);
		}
    if ($newh > $height) {
		$newh = $height; 
		$neww = round($newh * $ratio);
		}
	return(array($neww, $newh));
    }
?>