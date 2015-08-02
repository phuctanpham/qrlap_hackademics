<!DOCTYPE html>
<html>
    <head>
        <title>Vietnam Hackademics Lab</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <img class="bg" src="img/bg.jpg" alt="" />
        <div id="wrapper" class="container-fluid" >
            <div id="wellcome" class="text-center">
                <img src="img/logo.png" alt="" />
                <h3>Vietnam Hackademics Lab</h3>
                <h4>The cross-functional lab management for nation</h4>
                <div id="login-form">
                    <form class="form-signin">
                            <input type="text" class="form-control" placeholder="Email address" autofocus>
                            <input type="password" class="form-control" placeholder="Password">
                    </form>
                    <button class="btn btn-lg btn-primary btn-block btnSignin">Sign in</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
            //$('.item').each(function(){
                $('.btnSignin').click(function(){
                    $('#wellcome').fadeOut('slow',function(){
                        location.href = 'tab.php';
                    });
                });
            //});
            });
        </script>
    </body>
</html>