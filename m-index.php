<?php include('header.php'); ?>

<div class="span4"></div>
<div style="width: 500px; margin: 0 auto; padding:10px;" class="scanqr span4 alert-info">
    <h2 class="text-center">Scan QRCode on Access Card:</h2>
    <form style="text-align: center;" id="form_file" action="decode-user.php" method="post" enctype="multipart/form-data">
        <?php $type = $_REQUEST['type']; ?>
        <input type="hidden" value="<?= $type ?>" name="type" />
        <input id="file" name="file" type="file" title="Scan" accept="image/*" />
    </form>
    
  
</div>
<div class="span4"></div>

<?php include('footer.php'); ?>

<script type="text/javascript">
    $(document).ready( function() {
        
        $('#file').change(function(){
            $('.scanqr').fadeOut('slow', function(){
               $( "#form_file" ).submit(); 
            });
        });
    })
    
</script>