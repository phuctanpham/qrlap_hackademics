<?php include('header.php'); ?>
<?php
if(isset($_REQUEST['search'])){
    $term = $_REQUEST['search'];
    $qUser = "SELECT *
FROM `qa_library`
WHERE `qa_library`.`title` like '%$term%'
ORDER BY `qa_library`.`title`";
} else{
    $qUser = "SELECT *
FROM `qa_library`
ORDER BY `qa_library`.`title`";
}
    $rUser = mysql_query($qUser);
    check($rUser, "query of $qUser");
?>
<?php if($detect->isMobile()){
                    ?>
<div class="text-center" style="width: 200px; margin: 0 auto;">
    <a class="btn btn-lg btn-primary" href="m-index.php?type=3"><span class="glyphicon glyphicon-search"></span>Scan</a>
</div>
<?php } ?>
<h3>Library Management</h3>
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
        <a href="thu-vien-action.php" class="btn btn-primary span2 pull-right">Add paper</a>
        <?php } ?>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Author</th>
                <th>Quantity</th>
                <th>Category</th>
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
                <td><?= $row["title"] ?></td>
                <td><?= $row["author"] ?></td>
                <td><?= $row["quantity"] ?></td>
                <td><?= $row["category"] ?></td>
                <td><?= $row["import_date"] ?></td>
                <td><?= $row["note"] ?></td>
                <td>
                    <a href="lich-su-thu-vien.php?id=<?= $row['id'] ?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-time"></span>
                        Lịch sử
                    </a>
                    <?php if(!$detect->isMobile()){
                    ?>
                    <a href="thu-vien-action.php?id=<?= $row['id'] ?>" class="btn btn-primary">
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