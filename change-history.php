<?php
include ('database.php');
$id = $_REQUEST['id'];
$quantity = $_REQUEST['quantity'];
$type = $_REQUEST['type'];

if($type == 1){
    mysql_query("UPDATE qa_history_chemical
                SET 
                quantity = $quantity
                WHERE id = $id");
} else if($type == 2){
    mysql_query("UPDATE qa_history_equipment
                SET 
                quantity = $quantity
                WHERE id = $id");
} else if($type == 3){
    mysql_query("UPDATE qa_history_library
                SET 
                quantity = $quantity
                WHERE id = $id");
} else {
    echo 'a';
}

?>
