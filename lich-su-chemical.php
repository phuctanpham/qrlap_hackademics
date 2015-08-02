<?php include('header.php'); ?>
<div id="history">
    <?php
    $user = $_REQUEST['id'];
    if(isset($_REQUEST['search'])){
        $term = $_REQUEST['search'];
        $qHistory = "select qa_history_chemical.* 
            from qa_history_chemical 
            join qa_user
            on qa_history_chemical.user = qa_user.id
            where qa_history_chemical.chemical = $user and qa_user.full_name like '%$term%'
            order by qa_history_chemical.time desc";
    } else{
        $qHistory = "select qa_history_chemical.* 
            from qa_history_chemical 
            join qa_user
            on qa_history_chemical.user = qa_user.id
            where qa_history_chemical.chemical = $user
            order by qa_history_chemical.time desc";
    }
        $rHistory = mysql_query($qHistory);
        check($rHistory, "query of $qHistory");
    ?>
    <?php
        $rUser = mysql_query("SELECT * FROM qa_chemical WHERE id = ".$user);
        $user = mysql_fetch_array($rUser); ?>
    <h3>Lịch sử: <?= $user['name'] ?></h3>
    <div id="nav" class="row-fluid">
        <div class="span3 pull-right">
            <form method="get">
                <div class="input-group pull-right">
                    <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>" />
                    <input type="text" name="search" class="form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Chemical</th>
                    <th>Quantity</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($row = mysql_fetch_array($rHistory)) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    
                    <?php
                    $rChemical = mysql_query("SELECT * FROM qa_user WHERE id = ".$row['user']);
                    $chemical = mysql_fetch_array($rChemical); ?>
                    <td><?= $chemical["full_name"] ?></td>

                    <td><?= $row["quantity"] ?></td>
                    <td><?= $row["time"] ?></td>
                </tr>
                <?php 
                $i++;
                } ?>

            </tbody>
        </table>
    </div>
</div>
<?php include('footer.php'); ?>
