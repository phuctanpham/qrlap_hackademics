<?php include('header.php') ?>
<?php $type = $_REQUEST['type']; ?>
<?php
    if(isset($_FILES["file"]["tmp_name"])){
        $_FILES["file"]["name"] = "qrcode.jpg";
        move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
        ?>
<div style="width: 500px; margin: 0 auto; padding:10px;" class="alert-info text-center">
<div class="result">
    
</div>
<!--    <div class="rescanqr">
<h2 class="text-center">Scan QRCode on chemical bottle</h2>
<form style="text-align: center;" id="form_file"  action="decode-chemical.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $type ?>" name="type" />
    <input id="file" name="file" type="file" title="Rescan" accept="image/*" />
</form>
</div>-->
</div>
<script type="text/javascript" src="qrcode_decoder/grid.js"></script>
<script type="text/javascript" src="qrcode_decoder/version.js"></script>
<script type="text/javascript" src="qrcode_decoder/detector.js"></script>
<script type="text/javascript" src="qrcode_decoder/formatinf.js"></script>
<script type="text/javascript" src="qrcode_decoder/errorlevel.js"></script>
<script type="text/javascript" src="qrcode_decoder/bitmat.js"></script>
<script type="text/javascript" src="qrcode_decoder/datablock.js"></script>
<script type="text/javascript" src="qrcode_decoder/bmparser.js"></script>
<script type="text/javascript" src="qrcode_decoder/datamask.js"></script>
<script type="text/javascript" src="qrcode_decoder/rsdecoder.js"></script>
<script type="text/javascript" src="qrcode_decoder/gf256poly.js"></script>
<script type="text/javascript" src="qrcode_decoder/gf256.js"></script>
<script type="text/javascript" src="qrcode_decoder/decoder.js"></script>
<script type="text/javascript" src="qrcode_decoder/qrcode.js"></script>
<script type="text/javascript" src="qrcode_decoder/findpat.js"></script>
<script type="text/javascript" src="qrcode_decoder/alignpat.js"></script>
<script type="text/javascript" src="qrcode_decoder/databr.js"></script>

<script type="text/javascript">
    $(document).ready( function() {
        qrcode.callback = showInfo;
        //$("#btnDecode").click(qrCodeDecoder);
        $('#file').change(function(){
            $( "#form_file" ).submit();
        });
        $('.rescanqr').hide();
        qrcode.decode("qrcode.jpg");
    })
    
    function qrCodeDecoder() {
        
    }
</script>
<?php if($type==1){ ?>
<script type="text/javascript">
    function showInfo(data) {
        $.ajax({
            type: "POST",
            url: "show-chemical.php",
            data: { id: data }
        })
        .success(function( result ) {
            if(result == ''){
                $('.result').html('<h2 class="text-danger">Not Found</h2>');
                $('.rescanqr').show();
            } else {
                $('.result').html(result);
            }
        });
    }
</script>
<?php } else if($type == 2){ ?>
<script type="text/javascript">
    function showInfo(data) {
        $.ajax({
            type: "POST",
            url: "show-equipment.php",
            data: { id: data }
        })
        .success(function( result ) {
            if(result == '404'){
                $('.result').html('<h2 class="text-danger">Not Found</h2>');
                $('.rescanqr').show();
            } else {
                $('.result').html(result);
            }
        });
    }
</script>
<?php } else if($type == 3){?>
<script type="text/javascript">
    function showInfo(data) {
        $.ajax({
            type: "POST",
            url: "show-library.php",
            data: { id: data }
        })
        .success(function( result ) {
            if(result == '0'){
                $('.result').html('<h2 class="text-danger">Not Found</h2>');
                $('.rescanqr').show();
            } else {
                $('.result').html(result);
            }
        });
    }
</script>
<?php } ?>
<?php
    } else {
?>
<div  style="width: 500px; margin: 0 auto; padding:20px;" class="alert-info" >
<?php $user = $_COOKIE["user"]; ?>
    <?php
        $rUser = mysql_query("SELECT * FROM qa_user WHERE id = ".$user);
        $user = mysql_fetch_array($rUser); ?>
<h2 class="text-center">Xin chào: <?= $user['full_name'] ?></h2>
<h2 class="text-center">Scan QRCode on product</h2>
<form style="text-align: center;" id="form_file"  action="decode-chemical.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?= $type ?>" name="type" />
    <input id="file" name="file" type="file" title="Scan" accept="image/*" />
</form>
</div>
<script type="text/javascript">
    $(document).ready( function() {
        $('#file').change(function(){
            $( "#form_file" ).submit();
        });
    })
</script>

<?php } ?>
<?php include('footer.php') ?>