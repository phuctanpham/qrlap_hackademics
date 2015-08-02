<?php include('Mobile_Detect.php'); ?>
<?php
$detect = new Mobile_Detect;
 
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
 ?>
<script type="text/javascript">
    location.href="tab.php";
</script>
<?php
} else {
?>
<script type="text/javascript">
    location.href="pc-index.php";
</script>
<?php
}
?>