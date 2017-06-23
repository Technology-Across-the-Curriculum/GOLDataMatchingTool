<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo APP_NAME; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Custoome css !-->
    <link rel="stylesheet" href="<?php echo URL; ?>css/login.css">
</head>
<body>

<?php require TEMP . 'navbar.php' ?>

<div class="container">

    <div class="form-signin">
        <p class="alert alert-warning hidden" id="loginerror"><i class="fa fa-exclamation-triangle "></i> Username or Password was incorrect.</p>
        <form action="<?php echo URL . 'home/login'; ?> " method="POST" name="login-form">
        <h2 class="form-signin-heading">Login</h2>
        <!-- Username input !-->
        <div class="form-group">
            <label for="username" class="sr-only">Email address</label>
            <input type="text" id="username" class="form-control" placeholder="Username" required autofocus>
        </div>
        <!-- Password input !-->
        <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </div>

</div> <!-- /container -->


<!-- jQuery 2.1.4 -->
<script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script>
    var url = '<?php echo URL; ?>';
</script>

<!-- Login javascript !-->
<script src="<?php echo URL; ?>js/login.js"></script>
</body>
</html>
