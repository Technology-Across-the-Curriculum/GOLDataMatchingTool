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

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login</h4>
            </div>
            <div class="modal-body">
                <div id="login-wrapper">
                    <!-- Username input !-->
                    <div class="row form-group">
                        <label for="username" class="cols-lg-12 control-label">Username</label>
                        <div class="cols-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"
                                       placeholder="username"/>
                            </div>
                        </div>
                    </div>

                    <!-- Password input !-->
                    <div class="row form-group">
                        <label for="password" class="cols-lg-12 control-label">Password</label>
                        <div class="cols-lg-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="password" id="password"
                                       placeholder="username"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="login" type="button" class="btn btn-primary">login</button>
            </div>
        </div>
    </div>
</div>


<!-- jQuery 2.1.4 -->
<script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script>
    var url = '<?php echo URL; ?>';
</script>

<!-- Login javascript !-->
<script src="<?php echo URL; ?>bower_components/login.js"></script>
</body>
</html>
