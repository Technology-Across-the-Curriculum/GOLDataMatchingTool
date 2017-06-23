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

    <!-- Google fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="<?php echo URL; ?>css/base.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/landing-page.css" rel="stylesheet">
</head>
<body>

<?php require TEMP . 'navbar.php' ?>

<div class="main-content">
    <div class="content">
        <header class="col-lg-12">
            <h1>404</h1>
            <p>page not found</p>
        </header>

    </div>
</div>
<!-- jQuery 2.1.4 -->
<script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo URL; ?>bower_components/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
