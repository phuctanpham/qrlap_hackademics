<?php include('header.php'); ?>
<div id="history" class="span8">
    
    <?php
    $user = $_REQUEST['id'];
    $rUser = mysql_query("SELECT * FROM qa_user WHERE id = " . $user);
    $user = mysql_fetch_array($rUser);
    ?>
    <h3>Lịch sử: <?= $user['full_name'] ?></h3>
    <div id="nav" class="row-fluid">
        <ul>
            <li class="active"><a class="btn btn-lg" data-toggle="tab" href="#chemical">Chemical</a></li>
            <li><a class="btn btn-lg" data-toggle="tab" href="#equipment">Equipment</a></li>
        <li><a class="btn btn-lg" data-toggle="tab" href="#library">Library</a></li>
        </ul>
    </div>
    <div class="tab-content">
    <div id="chemical" class="tab-pane active" >
        <?php
    $user = $_REQUEST['id'];
    $qHistory = "select qa_history_chemical.* 
            from qa_history_chemical 
            join qa_chemical 
            on qa_history_chemical.chemical = qa_chemical.id
            where qa_history_chemical.user = $user
            order by qa_history_chemical.time desc";
    $rHistory = mysql_query($qHistory);
    check($rHistory, "query of $qHistory");
    ?>
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
                            $rChemical = mysql_query("SELECT * FROM qa_chemical WHERE id = " . $row['chemical']);
                            $chemical = mysql_fetch_array($rChemical);
                            ?>
                            <td><?= $chemical["name"] ?></td>
                            <td><?= $row["quantity"] . ' ' ?><?= $chemical['unit'] ?></td>
                            <td><?= $row["time"] ?></td>
                        </tr>
    <?php
    $i++;
}
?>

                </tbody>
            </table>
        </div>
    </div>
    
    <div id="equipment" class="tab-pane" >
        <?php
    $user = $_REQUEST['id'];
    $qHistory = "select * 
            from qa_history_equipment 
            join qa_equipment 
            on qa_history_equipment.equipment = qa_equipment.id
            where qa_history_equipment.user = $user
            order by qa_history_equipment.time desc";
    $rHistory = mysql_query($qHistory);
    check($rHistory, "query of $qHistory");
    ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Equipment</th>
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
                            $rChemical = mysql_query("SELECT * FROM qa_equipment WHERE id = " . $row['equipment']);
                            $chemical = mysql_fetch_array($rChemical);
                            ?>
                            <td><?= $chemical["name"] ?></td>                           
                            <td><?= $row["quantity"] . ' ' ?></td>
                            <td><?= $row["time"] ?></td>
                        </tr>
    <?php
    $i++;
}
?>

                </tbody>
            </table>
        </div>
    </div>
    
    <div id="library" class="tab-pane" >
        <?php
    $user = $_REQUEST['id'];
    $qHistory = "select * 
            from qa_history_library
            join qa_library 
            on qa_history_library.library = qa_library.id
            where qa_history_library.user = $user
            order by qa_history_library.time desc";
    $rHistory = mysql_query($qHistory);
    check($rHistory, "query of $qHistory");
    ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Paper</th>
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
                            $rChemical = mysql_query("SELECT * FROM qa_library WHERE id = " . $row['library']);
                            $chemical = mysql_fetch_array($rChemical);
                            ?>
                            <td><?= $chemical["title"] ?></td>                           
                            <td><?= $row["quantity"] . ' ' ?></td>
                            <td><?= $row["time"] ?></td>
                        </tr>
    <?php
    $i++;
}
?>

                </tbody>
            </table>
        </div>
    </div>
        </div>
</div>
    
<div id="info" class="span4">
    <?php
    $rUser = mysql_query("SELECT * FROM qa_user WHERE id = " . $user);
    $user = mysql_fetch_array($rUser);
    ?>
    <h3>Thông tin: <?= $user['full_name'] ?></h3>
    <h4>Chức vụ:</h4> <?= $user['position'] ?><br/>
    <h4>Phòng ban:</h4> <?= $user['department'] ?><br/>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#nav a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        })
    });
</script>
<?php include('footer.php'); ?>
