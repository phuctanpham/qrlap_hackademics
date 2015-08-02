<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-select.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- JavaScript
================================================== -->

<script src="js/jquery.qrcode.min.js" type="text/javascript"></script>

<script src="bootstrap/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap.file-input.js" type="text/javascript"></script>
<script src="bootstrap/js/bootstrap-tabs.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.selectpicker').selectpicker();
        $('input[type=file]').bootstrapFileInput();
    });
</script>
<?php

include('database.php');

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $rChemical = mysql_query("SELECT * FROM qa_library WHERE qa_library.code = '".$id."'");
    $chemical = mysql_fetch_array($rChemical);
    if($chemical['title'] == ''){
        echo '404';
    } else {
    ?>
        <div style="font-size: 20px;">
            <b>Code:</b> <?= $chemical['code'] ?><br/>
            <b>Name:</b> <?= $chemical['title'] ?> <br/>
            <b>Category:</b> <?= $chemical['category'] ?> <br/>
            <b>Số lượng:</b> <?= $chemical['quantity'].' ' ?><br/>
        </div>
    <form id="lendForm" action="lend-chemical.php" method="post">
        <h3>Quantity take</h3>
            <input type="hidden" value="<?= $_COOKIE['user'] ?>" name="user" />
            <input type="hidden" value="<?= $chemical['id'] ?>" name="id" />
            <input type="hidden" value="3" name="type" />
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="quantity" placeholder="">
            </div>
            <br/>
            <a class="btn btn-lg btn-primary btnScan" type="submit">Next Scan</a>
            <a class="btn btn-lg btn-info btnDone" style="margin-left: 50px;">Complete</a>
    </form>
<div>
    <script type="text/javascript">
        $(document).ready(function(){
            var flag = 0;
            $('.btnScan').click(function(){
               flag = 1;
               $('#lendForm').submit();
            });
            
            $('.btnDone').click(function(){
               flag = 2;
               $('#lendForm').submit();
            });
            
            $('#lendForm').submit(function(){
                $.ajax({
                    type: this.method,
                    url: this.action,
                    data: $(this).serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        if(flag == 1)
                            location.href='decode-chemical.php?type=3';
                        else if(flag == 2)
                            location.href='done-chemical.php?type=3';
                    }
                });

                return false;
            });
            
            
        });
    </script>
</div>
<?php
    }
}
unlink('qrcode.jpg');
?>
