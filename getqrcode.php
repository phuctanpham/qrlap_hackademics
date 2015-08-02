<?php
include('phpqrcode/qrlib.php');
$dir = 'qrcode.png';
$code = $_REQUEST['code'];

QRcode::png($code, $dir);
header("Content-type: application/png"); 
header('Content-Disposition: inline; filename="' . $dir . '"'); 
header("Content-Transfer-Encoding: Binary"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  
header("Cache-Control: post-check=0, pre-check=0", false);  
header("Pragma: no-cache"); 
header("Content-length: ".filesize($dir)); 
header('Content-Type: application/octet-stream'); 
header('Content-Disposition: attachment; filename="' . $code.'.png' . '"'); 
readfile("$dir");
unlink($dir);
?>
