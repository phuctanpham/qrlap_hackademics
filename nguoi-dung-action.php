<?php include('header.php'); ?>
<?php
if(isset($_POST['code']))
{
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $code = $_POST['code'];
        $name = $_POST['name'];
        $position = $_POST['position'];
        $department = $_POST['department'];

        mysql_query("UPDATE qa_user SET code = '$code', full_name = '$name', position = '$position', department = '$department', role = 0 WHERE id = $id")
                or die("Could not execute the update query.");
    } else {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    
    mysql_query("insert into qa_user(code,full_name,position,department,role) values('$code','$name','$position','$department',0)")
            or die("Could not execute the insert query.");
    }
    ?>
    <script>
        location.href="quan-ly-nhan-su.php";
    </script>
<?php
} else {
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $qUser = "SELECT *
    FROM `qa_user`
    WHERE `qa_user`.`id` = $id";
    $rUser = mysql_query($qUser);
    $user = mysql_fetch_array($rUser);
    
    ?>
    
    <h3>Edit user info</h3>
<div class="span5 offset2">
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <div class="form-group">
            <label for="code">Mã số:</label>
            <input type="text" class="form-control" value="<?= $user['code'] ?>" id="code" name="code" placeholder="VD:U001...">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" value="<?= $user['full_name'] ?>" id="name" name="name" placeholder="Phạm Văn A">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" value="<?= $user['position'] ?>" id="position" name="position" placeholder="Chức vụ">
        </div>
        <div class="form-group">
            <label for="department">Dept.:</label>
            <input type="text" class="form-control" value="<?= $user['department'] ?>" id="department" name="department" placeholder="Phòng ban">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            <a class="btn btn-lg" href="quan-ly-nhan-su.php">Cancel</a>
        </div>
    </form>
</div>
    
    <?php
    
    } else {
?>
    <h3>Add user</h3>
<div class="span5 offset2">
    <form method="post">
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="VD:U001...">
        </div>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Họ và tên">
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Chức vụ">
        </div>
        <div class="form-group">
            <label for="department">Dept.:</label>
            <input type="text" class="form-control" id="department" name="department" placeholder="Phòng ban">
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Add</button>
            <a class="btn btn-lg" href="quan-ly-nhan-su.php">Cancel</a>
        </div>
    </form>
</div>
<?php 
    }
} ?>
<?php include('footer.php'); ?>