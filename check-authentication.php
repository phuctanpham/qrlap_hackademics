<?php
if(!isset($_SESSION["user"]) && !$detect->isMobile()){
    ?>
<script>
    location.href="pc-index.php";
</script>
<?php
}
?>