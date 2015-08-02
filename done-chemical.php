<?php
include('header.php');
$type = $_REQUEST['type'];

if($type == 1){
?>
<?php
    $user = $_COOKIE['user'];
    $qHistory = "select qa_history_chemical.*
            from qa_history_chemical 
            join qa_chemical 
            on qa_history_chemical.chemical = qa_chemical.id
            where qa_history_chemical.user = $user and qa_history_chemical.state = 1
            order by qa_history_chemical.time desc";
    $rHistory = mysql_query($qHistory);
    check($rHistory, "query of $qHistory");
    ?>
<div style="margin-bottom:20px;overflow: hidden;">
    <a href="decode-chemical.php?type=1" class="btn btn-lg btn-primary pull-left">Quét tiếp</a>
    <a class="btn btn-lg btn-info pull-right btnConfirm" href="javascript:Confirm();">Xác nhận</a>
</div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Chemical</th>
                        <th>Quantity</th>
                        <th>Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysql_fetch_array($rHistory)) {
                        ?>
                        <tr id="<?= $row['id'] ?>">
                            <td><?= $i ?></td>

                            <?php
                            $rChemical = mysql_query("SELECT * FROM qa_chemical WHERE id = " . $row['chemical']);
                            $chemical = mysql_fetch_array($rChemical);
                            ?>
                            <td><?= $chemical["name"] ?></td>
                            <td class="quantity"><?= $row["quantity"] ?></td>
                            <td><?= $row["time"] ?></td>
                            <td>
                                <a class="btn btn-primary btnDone">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Done
                                </a>
                                <a class="btn btn-primary btnEdit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a class="btn btn-danger btnDelete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </a>
                            </td>
                        </tr>
    <?php
    $i++;
}
?>

                </tbody>
            </table>
        </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btnDone').hide();
        $('.btnEdit').each(function(){
            $(this).click(function(){
                var quan = $(this).closest('tr').find('.quantity').text();
                $(this).closest('tr').find('.quantity').html('<input type="text" value="'+quan+'" />');
                $(this).hide();
                $(this).closest('tr').find('.btnDone').show();
            }); 
        });
        
        $('.btnDone').each(function(){
            $(this).click(function(){
                var quan = $(this).closest('tr').find('input').val();
                var id = $(this).closest('tr').attr('id');
                $.ajax({
                    type: 'post',
                    url: 'change-history.php',
                    data: {id : id, type : 1, quantity : quan}
                });
                $(this).closest('tr').find('.quantity').html(quan);
                $(this).hide();
                $(this).closest('tr').find('.btnEdit').show();
            }); 
        });
        
        $('.btnDelete').each(function(){
            $(this).click(function(){
                var id = $(this).closest('tr').attr('id');
                var answer = confirm ("Please click on OK to continue.")
                if (answer){
                    $.ajax({
                        type: 'post',
                        url: 'delete-history.php',
                        data: {id : id, type : 1},
                        success: function(data){
                            
                        }
                    });
                    $(this).closest('tr').fadeOut(function(){
                        $(this).remove();
                    });
                }
            }); 
        });
    });
    
    function Confirm() {
        var answer = confirm ("Please click on OK to continue.")
        if (answer)
            window.location="done.php?type=1";
    }
</script>
<?php
} else if($type == 2){
?>
<?php
    $user = $_COOKIE['user'];
    $qHistory = "select qa_history_equipment.*
            from qa_history_equipment 
            join qa_equipment 
            on qa_history_equipment.equipment = qa_equipment.id
            where qa_history_equipment.user = $user and qa_history_equipment.state = 1
            order by qa_history_equipment.time desc";
    $rHistory = mysql_query($qHistory);
    check($rHistory, "query of $qHistory");
    ?>
<div style="margin-bottom:20px;overflow: hidden;">
    <a href="decode-chemical.php?type=2" class="btn btn-lg btn-primary pull-left">Quét tiếp</a>
    <a class="btn btn-lg btn-info pull-right btnConfirm" href="javascript:Confirm();">Xác nhận</a>
</div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Dụng cụ</th>
                        <th>Số lượng</th>
                        <th>Thời gian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysql_fetch_array($rHistory)) {
                        ?>
                        <tr id="<?= $row['id'] ?>">
                            <td><?= $i ?></td>

                            <?php
                            $rChemical = mysql_query("SELECT * FROM qa_equipment WHERE id = " . $row['equipment']);
                            $chemical = mysql_fetch_array($rChemical);
                            ?>
                            <td><?= $chemical["name"] ?></td>                           
                            <td class="quantity"><?= $row["quantity"]?></td>
                            <td><?= $row["time"] ?></td>
                            <td>
                                <a class="btn btn-primary btnDone">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Done
                                </a>
                                <a class="btn btn-primary btnEdit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a class="btn btn-danger btnDelete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </a>
                            </td>
                        </tr>
    <?php
    $i++;
}
?>

                </tbody>
            </table>
        </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btnDone').hide();
        $('.btnEdit').each(function(){
            $(this).click(function(){
                var quan = $(this).closest('tr').find('.quantity').text();
                $(this).closest('tr').find('.quantity').html('<input type="text" value="'+quan+'" />');
                $(this).hide();
                $(this).closest('tr').find('.btnDone').show();
            }); 
        });
        
        $('.btnDone').each(function(){
            $(this).click(function(){
                var quan = $(this).closest('tr').find('input').val();
                var id = $(this).closest('tr').attr('id');
                $.ajax({
                    type: 'post',
                    url: 'change-history.php',
                    data: {id : id, type : 2, quantity : quan}
                });
                $(this).closest('tr').find('.quantity').html(quan);
                $(this).hide();
                $(this).closest('tr').find('.btnEdit').show();
            }); 
        });
        
        $('.btnDelete').each(function(){
            $(this).click(function(){
                var id = $(this).closest('tr').attr('id');
                var answer = confirm ("Please click on OK to continue.")
                if (answer){
                    $.ajax({
                        type: 'post',
                        url: 'delete-history.php',
                        data: {id : id, type : 2},
                        success: function(data){
                            alert(data);
                        }
                    });
                    $(this).closest('tr').fadeOut(function(){
                        $(this).remove();
                    });
                }
            }); 
        });
    });
    
    function Confirm() {
        var answer = confirm ("Please click on OK to continue.")
        if (answer)
            window.location="done.php?type=2";
    }
</script>
<?php
} else if($type == 3){
?>
<?php
    $user = $_COOKIE['user'];
    $qHistory = "select qa_history_library.*
            from qa_history_library
            join qa_library 
            on qa_history_library.library = qa_library.id
            where qa_history_library.user = $user and qa_history_library.state = 1
            order by qa_history_library.time desc";
    $rHistory = mysql_query($qHistory);
    check($rHistory, "query of $qHistory");
    ?>
<div style="margin-bottom:20px;overflow: hidden;">
    <a href="decode-chemical.php?type=3" class="btn btn-lg btn-primary pull-left">Quét tiếp</a>
    <a class="btn btn-lg btn-info pull-right btnConfirm" href="javascript:Confirm();">Xác nhận</a>
</div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sách</th>
                        <th>Số lượng</th>
                        <th>Thời gian</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysql_fetch_array($rHistory)) {
                        ?>
                        <tr id="<?= $row['id'] ?>">
                            <td><?= $i ?></td>

                            <?php
                            $rChemical = mysql_query("SELECT * FROM qa_library WHERE id = " . $row['library']);
                            $chemical = mysql_fetch_array($rChemical);
                            ?>
                            <td><?= $chemical["title"] ?></td>                           
                            <td class="quantity"><?= $row["quantity"] ?></td>
                            <td><?= $row["time"] ?></td>
                            <td>
                                <a class="btn btn-primary btnDone">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Done
                                </a>
                                <a class="btn btn-primary btnEdit">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Edit
                                </a>
                                <a class="btn btn-danger btnDelete">
                                    <span class="glyphicon glyphicon-trash"></span>
                                    Delete
                                </a>
                            </td>
                        </tr>
    <?php
    $i++;
}
?>

                </tbody>
            </table>
        </div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btnDone').hide();
        $('.btnEdit').each(function(){
            $(this).click(function(){
                var quan = $(this).closest('tr').find('.quantity').text();
                $(this).closest('tr').find('.quantity').html('<input type="text" value="'+quan+'" />');
                $(this).hide();
                $(this).closest('tr').find('.btnDone').show();
            }); 
        });
        
        $('.btnDone').each(function(){
            $(this).click(function(){
                var quan = $(this).closest('tr').find('input').val();
                var id = $(this).closest('tr').attr('id');
                $.ajax({
                    type: 'post',
                    url: 'change-history.php',
                    data: {id : id, type : 3, quantity : quan}
                });
                $(this).closest('tr').find('.quantity').html(quan);
                $(this).hide();
                $(this).closest('tr').find('.btnEdit').show();
            }); 
        });
        
        $('.btnDelete').each(function(){
            $(this).click(function(){
                var id = $(this).closest('tr').attr('id');
                var answer = confirm ("Please click on OK to continue.")
                if (answer){
                    $.ajax({
                        type: 'post',
                        url: 'delete-history.php',
                        data: {id : id, type : 3},
                        success: function(data){
                            alert(data);
                        }
                    });
                    $(this).closest('tr').fadeOut(function(){
                        $(this).remove();
                    });
                }
            }); 
        });
    });
    
    function Confirm() {
        var answer = confirm ("Please click on OK to continue.")
        if (answer)
            window.location="done.php?type=3";
    }
</script>
<?php
}
?>

<?php include('footer.php'); ?>