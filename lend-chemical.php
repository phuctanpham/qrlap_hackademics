
<?php
include('database.php');
$user = $_COOKIE["user"];
$chem = $_REQUEST['id'];
$type = $_REQUEST['type'];
$quantity = $_REQUEST['quantity'];
if($quantity == ''){
    $quantity = 0;
}

if($type == 1){
    check(mysql_query("insert into qa_history_chemical(user,chemical,quantity,time, state) values($user, $chem, $quantity,'".date('Y-m-d h:i:s')."', 1)"), 'insert');
} else if($type == 2){
    check(mysql_query("insert into qa_history_equipment(user,equipment,quantity,time, state) values($user, $chem, $quantity,'".date('Y-m-d h:i:s')."', 1)"), 'insert');
} else if($type == 3){
    check(mysql_query("insert into qa_history_library(user,library,quantity,time, state) values($user, $chem, $quantity,'".date('Y-m-d h:i:s')."', 1)"), 'insert');
}

?>