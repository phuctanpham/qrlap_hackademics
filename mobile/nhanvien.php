<?php 
//http://localhost:8080/sample1/webservice2.php?json={%22UserName%22:1,%22FullName%22:2}
//$json=$_GET ['json'];
$json = file_get_contents('php://input');
$obj = json_decode($json);
error_reporting(0);
require_once("../database.php");
$result = mysql_query("SELECT * FROM qa_user WHERE code='{$_GET['id']}'");
$i=0;
while ($row = mysql_fetch_array($result)) {
    $id = $row{'code'};
    $name = $row{'full_name'};
    $position = $row{'position'};
    $department = $row{'department'};
    $i++;
}
if($i>0)
    echo $id."\t".$name."\t\t".$position."\t".$department;
else
print "Không xác định được nhân viên";
?>
