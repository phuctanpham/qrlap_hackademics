<?php include('header.php'); ?>
<?php
if(isset($_REQUEST['search'])){
    $term = $_REQUEST['search'];
    $qUser = "SELECT *
FROM `qa_user`
WHERE `qa_user`.`role` = 0 and `qa_user`.`full_name` like '%$term%'
ORDER BY `qa_user`.`full_name`";
} else{
    $qUser = "SELECT *
FROM `qa_user`
WHERE `qa_user`.`role` = 0
ORDER BY `qa_user`.`full_name`";
}
    $rUser = mysql_query($qUser);
    check($rUser, "query of $qUser");
?>
<h3>User Management</h3>
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
        <a href="nguoi-dung-action.php" class="btn btn-primary span2 pull-right">Add user</a>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Dept.</th>
                <th>Position</th>
                <th>Last Access</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysql_fetch_array($rUser)) {
            ?>
            <tr>
                <td><?= $row["code"] ?></td>
                <td><?= $row["full_name"] ?></td>
                <td><?= $row["position"] ?></td>
                <td><?= $row["department"] ?></td>
                <td><?= $row["last_time_logged"] ?></td>
                <td>
                    <a href="lich-su.php?id=<?= $row['id'] ?>" class="btn btn-info">
                        <span class="glyphicon glyphicon-time"></span>
                        History
                    </a>
                    <a href="nguoi-dung-action.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit"></span>
                        Edit
                    </a>
                    <a class="btn btn-danger btnDelete">
                        <span class="glyphicon glyphicon-trash"></span>
                        Delete
                    </a>
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