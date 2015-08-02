<?php
include('database.php');
$type = $_REQUEST['type'];

if($type == 1){
    mysql_query("UPDATE qa_history_chemical
                SET 
                state = 0
                WHERE state = 1");
} else if($type == 2){
    mysql_query("UPDATE qa_history_equipment
                SET 
                state = 0
                WHERE state = 1");
} else if($type == 3){
    mysql_query("UPDATE qa_history_library
                SET 
                state = 0
                WHERE state = 1");
}

setcookie('user', '0');
header( 'Location: index.php' ) ;
?>
