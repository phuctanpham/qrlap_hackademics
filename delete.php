<?php
include ('database.php');
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$url = '';

if($type == 1){
    mysql_query("DELETE FROM qa_chemical 
                WHERE id = $id");
    $url = 'quan-ly-hoa-chat.php';
} else if($type == 2){
    mysql_query("DELETE FROM qa_equipment
                WHERE id = $id");
    $url = 'quan-ly-dung-cu.php';
} else if($type == 3){
    check(mysql_query("DELETE FROM qa_library
                WHERE id = $id"),'aaa');
    $url = 'thu-vien.php';
} else if($type == 0){
    check(mysql_query("DELETE FROM qa_user
                WHERE id = $id"),'aaa');
    $url = 'quan-ly-nhan-su.php';
}

?>