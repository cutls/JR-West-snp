<?php 
session_start();
$fpath = base64_decode($_SESSION["base"]);
$fname = 'createdimage.jpg';
header('Content-Type: application/force-download');
header('Content-Length: '.strlen($fpath)); header('Content-disposition: attachment; filename="'.$fname.'"'); 
echo $fpath;