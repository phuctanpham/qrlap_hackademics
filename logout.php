<?php
session_start();
session_destroy();
header('location:pc-index.php');
?>