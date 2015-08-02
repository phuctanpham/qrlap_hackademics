<?php include('header.php'); ?>
<?php
if(isset($_REQUEST['search'])){
    $term = $_REQUEST['search'];
    $qChemical = "SELECT *
    FROM `qa_chemical`
    WHERE `qa_chemical`.`type` = 1 and `qa_chemical`.`name` like '%$term%'
    ORDER BY `qa_chemical`.`name`";
} else {
    $qChemical = "SELECT *
    FROM `qa_chemical`
    WHERE `qa_chemical`.`type` = 1
    ORDER BY `qa_chemical`.`name`";
}
    $rChemical = mysql_query($qChemical);
    check($rChemical, "query of $qChemical");
?>
<?php if($detect->isMobile()){
                    ?>
<div class="text-center" style="width: 200px; margin: 0 auto;">
    <a class="btn btn-lg btn-primary" href="m-index.php?type=1"><span class="glyphicon glyphicon-search"></span>Scan</a>
</div>
<?php } ?>
<h3>Chemical Management</h3>
<div id="nav" class="row-fluid">
    
    <div class="span3">
        <form method="get">
            <div class="input-group pull-right">
                <input type="text" name="search" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>
    </div>
    <?php if(!$detect->isMobile()){
                    ?>
    <a href="hoa-chat-action.php" class="btn btn-primary span2 pull-right">Add chemical</a>
    <?php } ?>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Note</th>
                <th>Name</th>
                <th>Manufacture</th>
                <th>Quantity</th>
                <th>Date Input</th>
                <th>Expire</th>
                <th>Type</th>
                <th>Location</th>
		<th?Note<th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysql_fetch_array($rChemical)) {
            ?>
            <?php 
                if((time()-(60*60*24)) < strtotime($row['expire_date'])){
                    echo '<tr>';
                } else {
            ?>
            <tr class="expire">
                <?php } ?>
                <td><?= $row["code"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["manufacture"] ?></td>
                <td><?= $row["quantity"].' ' ?><?= $row["unit"] ?> <?php if($row['x_quantity'] != '') echo 'x '.$row['x_quantity']; ?></td>
                <td><?php 
                    if($row['import_date'] != '') {
                        $date = date_create($row['import_date']);
                        echo date_format($date, 'd-m-Y');
                    }
                    ?>
                </td>
                <td><?php 
                    if($row['expire_date'] != '') {
                        $date = date_create($row['expire_date']);
                        echo date_format($date, 'd-m-Y');
                    }
                    ?>
                </td>
                <td><?= $row["form"] ?></td>
                <td><?= $row["position"] ?></td>
                <td><?= $row["note"] ?></td>
                <td>
                    <a href="lich-su-chemical.php?id=<?= $row['id'] ?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-time"></span>
                        History
                    </a>
                    <?php if(!$detect->isMobile()){
                    ?>
                    <a href="hoa-chat-action.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit"></span>
                        Edit
                    </a>
                    <a class="btn btn-danger btnDelete">
                        <span class="glyphicon glyphicon-trash"></span>
                        Delete
                    </a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btnDelete').click(function(){
           $(this).closest('tr').fadeOut('fast', function(){
              $(this).remove();
           });
        });
    })
</script>