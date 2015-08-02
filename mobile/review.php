<?php

$data = $_GET['data'];
echo $data;
echo "     :::  ";
$array = explode('-',$data);
$i = count($array);
$id_nv = $array[0];
$type = $array[1];
for($j=2;$j<($i-1);$j+=2){
	echo $array[$j];echo "\n";
	echo $array[$j+1];echo "\n";
}

?>