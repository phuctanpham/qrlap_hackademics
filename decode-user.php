
<?php
$_FILES["file"]["name"] = "qrcode.jpg";
move_uploaded_file($_FILES["file"]["tmp_name"],$_FILES["file"]["name"]);
?>
<?php include('header.php'); ?>
<div class="span4"></div>
<div style="width: 500px; margin: 0 auto; padding:10px;" class="scanqr span4 alert-info text-center">
    <div class="result">

    </div>
    <div class="row-fluid">
        <form id="form_file" action="decode-user.php" method="post" enctype="multipart/form-data">
            <?php $type = $_REQUEST['type']; ?>
            <input type="hidden" value="<?= $type ?>" name="type" />
            <input id="file" name="file" type="file" title="Rescan" accept="image/*" />
        </form>
    </div>
</div>

<div class="span4"></div>


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
        $('.scanqr').hide();
        qrcode.decode("qrcode.jpg");
    })
    
    function qrCodeDecoder() {
        
    }
    
    function showInfo(data) {
        
        $.ajax({
            type: "POST",
            url: "show-user.php",
            data: { id: data }
        })
        .success(function( result ) {
            
            if(result == '404'){
                $('.scanqr').fadeIn();
                $('.result').html('<h2 class="text-danger">Not Found</h2>');
                
            } else {
                location.href = 'decode-chemical.php?type=<?= $type ?>';
            }
        });
    }
</script>

<?php include('footer.php'); ?>