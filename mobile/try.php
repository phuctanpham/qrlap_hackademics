<?php 
//http://localhost:8080/sample1/webservice2.php?json={%22UserName%22:1,%22FullName%22:2}
//$json=$_GET ['json'];
$json = file_get_contents('php://input');
$obj = json_decode($json);
error_reporting(0);
require_once("../database.php");
$i=0;
if($i>0)
    echo $id."\n".$name."\n".$birthday."\n".$sex;
else
print "Không xác định được nhân viên";
?>
