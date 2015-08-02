<?php
include('database.php');

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $rUser = mysql_query("SELECT * FROM qa_user WHERE qa_user.code = 'U001'");
    $user = mysql_fetch_array($rUser);
    if($user['full_name'] == ''){
        echo '404';
    } else {
    ?>
    <h2 class="text-success"><?= $user['full_name'] ?></h2>
<?php
    setcookie("user", $user['id']);
    //header('location:decode-chemical.php');
    }
}
//unlink('qrcode.jpg');
?>
