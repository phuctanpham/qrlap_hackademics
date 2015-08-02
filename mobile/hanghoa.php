<?php 
//http://localhost:8080/sample1/webservice2.php?json={%22UserName%22:1,%22FullName%22:2}
//$json=$_GET ['json'];
$json = file_get_contents('php://input');
$obj = json_decode($json);
error_reporting(0);
require_once("../database.php");
$type = $_GET['type'];

if($type==1)
	$result = mysql_query("SELECT * FROM qa_chemical WHERE code='{$_GET['id']}'");
else if($type == 2)
	$result = mysql_query("SELECT * FROM qa_equipment WHERE code='{$_GET['id']}'");
else if($type == 2)
	$result = mysql_query("SELECT * FROM qa_library WHERE code='{$_GET['id']}'");

$i=0;
while ($row = mysql_fetch_array($result)) {
    $id = $row{'code'};
    $name = $row{'name'};
    if($type == 1){
	$iquantity = intval($row["quantity"]);
                    $iunit_quantity = intval($row["unit_quantity"]);
                    //$iquantity = 800;
                    $x = ($iquantity - $iquantity%$iunit_quantity)/$iunit_quantity;
                    if($iquantity%$iunit_quantity == 0){
                        $tonkho = $x.' x '.$iunit_quantity.' '.$row['unit'];
                    } else {
                        $tonkho = $x.' x '.$iunit_quantity.' '.$row['unit'].' + '.$iquantity%$iunit_quantity.' '.$row['unit'];
                    }
    } else {
    $tonkho= $row{'quantity'};
    }
    $i++;
}
if($i>0)
    echo $id."\t\t".$name."\t\t\t".$tonkho;
else
echo "Không xác định được sản phẩm";

?>
