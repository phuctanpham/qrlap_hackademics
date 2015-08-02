<?php include('header.php'); ?>

<?php
if(isset($_POST['code']))
{
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $code = $_POST['code'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $quantity = $_POST['quantity'];
        $import_date = $_POST['import_date'];
        $category = $_POST['category'];
        $note = $_POST['note'];

        check(mysql_query("UPDATE qa_library
                SET 
                code = '$code',
                title = '$title',
                author = '$author',
                quantity = $quantity,
                import_date = '$import_date',
                note = '$note'
                WHERE id = $id"), "ass");
    } else {
        $code = $_POST['code'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $quantity = $_POST['quantity'];
        $import_date = $_POST['import_date'];
        $category = $_POST['category'];
        $note = $_POST['note'];
    
    mysql_query("INSERT INTO `qa_library`(`code`, `title`, `author`, `quantity`, `import_date`, `category`, `note`) 
        VALUES
        ('$code','$title','$author',$quantity,'$import_date','$category','$note')")
            or die("Could not execute the insert query.");
    }
    ?>
    <script>
        location.href="thu-vien.php";
    </script>
<?php
} else {
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $qChemical = "SELECT *
    FROM `qa_library`
    WHERE `qa_library`.`id` = $id";
    $rChemical = mysql_query($qChemical);
    $chemical = mysql_fetch_array($rChemical);
    
    ?>
    
    <h3>Edit paper info</h3>
<div class="span5 offset2">
    <form method="post">
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" value="<?= $chemical['code'] ?>" id="code" name="code" placeholder="VD: C001...">
        </div>
        <div class="form-group">
            <label for="title">Name:</label>
            <input type="text" class="form-control" value="<?= $chemical['title'] ?>" id="title" name="title" placeholder="VD: H2O...">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" value="<?= $chemical['author'] ?>" id="author" name="author" placeholder="VD: Sigma...">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" value="<?= $chemical['quantity'] ?>" id="quantity" name="quantity" placeholder="VD: 2...">
        </div>
        <div class="form-group">
            <label for="import_date">Input Date:</label>
            <input type="date" class="form-control" value="<?= $chemical['import_date'] ?>" id="import_date" name="import_date" placeholder="YYYY-MM-DD">
        </div>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" value="<?= $chemical['category'] ?>" id="category" name="category" placeholder="VD: Kho Sanyo...">
        </div>
        <div class="form-group">
            <label for="note">Note:</label>
            <input type="text" class="form-control" value="<?= $chemical['note'] ?>" id="note" name="note" placeholder="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Update</button>
            <a class="btn btn-lg" href="thu-vien.php">Cancel</a>
        </div>
    </form>
</div>
    
    <?php
    
    } else {
?>
    <h3>Add paper</h3>
<div class="span5 offset2">
    <form method="post">
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" id="code" name="code" placeholder="VD: C001...">
        </div>
        <div class="form-group">
            <label for="title">Name:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="VD: H2O...">
        </div>
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" placeholder="VD: Sigma...">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" placeholder="VD: 2...">
        </div>
        <div class="form-group">
            <label for="import_date">Input Date:</label>
            <input type="date" class="form-control" id="import_date" name="import_date" placeholder="YYYY-MM-DD">
        </div>
        
        <div class="form-group">
            <label for="category">Category:</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="VD: Kho Sanyo...">
        </div>
        <div class="form-group">
            <label for="note">Note:</label>
            <input type="text" class="form-control" id="note" name="note" placeholder="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Add</button>
            <a class="btn btn-lg" href="thu-vien.php">Cancel</a>
        </div>
    </form>
</div>
<?php 
    }
} ?>
<?php include('footer.php'); ?>