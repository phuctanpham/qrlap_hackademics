<?php
$host = "localhost";
$username = "root";
$pass = "";
$databaseName = "chemicallab";
check(mysql_connect($host, $username, $pass), "connect");
mysql_query("SET NAMES utf8");
check(mysql_select_db($databaseName), "selecting db");



function check($result, $message) {
    if (!$result) {
        die("SQL error during $message: " . mysql_error());
    }
}
?>
