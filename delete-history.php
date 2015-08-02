<?php
include ('database.php');
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
echo $id;
if($type == 1){
    mysql_query("DELETE FROM qa_history_chemical 
                WHERE id = $id");
} else if($type == 2){
    mysql_query("DELETE FROM qa_history_equipment
                WHERE id = $id");
} else if($type == 3){
    check(mysql_query("DELETE FROM qa_history_library
                WHERE id = $id"),'aaa');
}

?>
