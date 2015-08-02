<?php 
include('database.php');
include('Mobile_Detect.php');
$detect = new Mobile_Detect;
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Vietnam Hackademics Lab</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-select.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- JavaScript
        ================================================== -->

        <script src="js/jquery.qrcode.min.js" type="text/javascript"></script>

        <script src="bootstrap/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.file-input.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap-tabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.selectpicker').selectpicker();
                $('input[type=file]').bootstrapFileInput();
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div id="header" class="row-fluid">
                <div id="logo" class="span2">
                    <a href="index.php">
                        <img src="img/logo.png" alt="" />
                    </a>
                </div>
                <div id="title" class="span6">
                    <h3>Vietnam Hackademics Lab</h3>
                    <h4>The cross-functional lab management for nation</h4>
                </div>
                <div id="login" class="span3">
                    <div class="row-fluid">
                        <!--                        <form class="form-signin">
                                                    <div class="span8">
                                                        <input type="text" class="form-control" placeholder="Email address" autofocus>
                                                        <input type="password" class="form-control" placeholder="Password">
                                                    </div>
                                                    <div class="span4">
                                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                                    </div>
                                                </form>-->
                        <?php 
                        
                        if ( !$detect->isMobile() ) { ?>
                        <h4><a style="color: white;" href="lich-su.php?id=3">Hi Admin!</a></h4>
                        <h5><i>Last login 3:89 23/2/2013</i></h5>
                            <a class="btn btn-primary" href="pc-index.php">Log out</a>
                        <?php } else {
                            ?>
                            
                            <?php
                        } ?>
                    </div>
                </div>
            </div>

            <div id="main" class="row-fluid">