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
    <link rel="stylesheet" href="<?php echo URL; ?>libs/bootstrap/dist/css/bootstrap.min.css">
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
            <h1><?php echo APP_NAME; ?></h1>
        </header>
        <section class="col-lg-offset-3 col-lg-6">
            <p></p>
        </section>
            <footer class="col-lg-12 text-center">
                <!-- Default to the left -->
                <!--<strong></strong> All rights reserved.-->
            </footer>
    </div>
</div>
<!-- jQuery 2.1.4 -->
<script src="<?php echo URL; ?>libs/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo URL; ?>libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>