<?php include('header.php'); ?>
<?php
if(isset($_REQUEST['search'])){
    $term = $_REQUEST['search'];
    $qUser = "SELECT *
FROM `qa_equipment`
WHERE `qa_equipment`.`name` like '%$term%'
ORDER BY `qa_equipment`.`name`";
} else{
    $qUser = "SELECT *
FROM `qa_equipment`
ORDER BY `qa_equipment`.`name`";
}
    $rUser = mysql_query($qUser);
    check($rUser, "query of $qUser");
?>
<?php if($detect->isMobile()){
                    ?>
<div class="text-center" style="width: 200px; margin: 0 auto;">
    <a class="btn btn-lg btn-primary" href="m-index.php?type=2"><span class="glyphicon glyphicon-search"></span>Scan</a>
</div>
<?php } ?>
<h3>Equipment Management</h3>
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
    <a href="dung-cu-action.php" class="btn btn-primary span2 pull-right">Add equipment</a>
    <?php
    }?>
        
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Manufacture</th>
                <th>Quantity</th>
                <th>Location</th>
                <th>Date input</th>
                <th>Note</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysql_fetch_array($rUser)) {
            ?>
            <tr>
                <td><?= $row["code"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["manufacture"] ?></td>
                <td><?= $row["quantity"] ?></td>
                <td><?= $row["position"] ?></td>
                <td><?= $row["import_date"] ?></td>
                <td><?= $row["note"] ?></td>
                <td>
                    <a href="lich-su-equipment.php?id=<?= $row['id'] ?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-time"></span>
                        History
                    </a>
                    <?php if(!$detect->isMobile()){
                    ?>
                    <a href="dung-cu-action.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit"></span>
                        Edit
                    </a>
                    <a class="btn btn-danger btnDelete">
                        <span class="glyphicon glyphicon-trash"></span>
                        Delete
                    </a>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.btnDelete').click(function(){
                            $(this).closest('tr').fadeOut('fast', function(){
                                $(this).remove();
                            });
                            });
                        })
                    </script>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>

<?php include('footer.php'); ?>