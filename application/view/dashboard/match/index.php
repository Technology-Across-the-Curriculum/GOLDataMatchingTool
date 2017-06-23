<?php
/**
 * Created by Nathan Healea.
 * Project: MineDash
 * File: dashboard-base.php
 * Date: 7/14/16
 * Time: 9:09 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo APP_NAME; ?></title>

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Dashboard Admin CSS -->
    <link href="<?php echo URL; ?>css/sb-admin-2.min.css" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL; ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo URL; ?>bower_components/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet"
    type="text/css">

    <!-- Custom Fonts -->
    <link href="<?php echo URL; ?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo URL; ?>css/matching-stylesheet.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php require TEMP . 'dashboard/navigation.php'; ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Header -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Matching Tool</h1>
                    </div>
                </div>

                <!-- Error messages !-->
                <div id="error-message" class="row">
                </div>


                <!-- Course and Section selection !-->
                <div class="row">

                    <!-- Save Buttom !-->
                    <div class="col-lg-4">
                        <h4>Save Changes:</h4>
                        <div id="save-btn" class="col-lg-4 btn btn-success">Save</div>
                    </div>


                    <!-- course selection !-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="courses"><h4>Select Course:</h4></label>
                            <select class="form-control" id="courses">
                                <option value='0' selected="selected">None</option>
                            </select>
                        </div>
                    </div>

                    <!-- section selection !-->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="sections"><h4>Select Section:</h4></label>
                            <select class="form-control" id="sections">
                                <option value='0' selected="selected">None</option>
                            </select>

                        </div>
                    </div>
                </div>

                <!-- Classlist Panel !-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-list fa-fw"></i> Class List
                                <div class="pull-right">
                                    <a data-toggle="collapse" data-target="#classlist-wrapper">
                                        <i class="fa fa-minus fa-fw"></i>
                                    </a>
                                </div>

                            </div>
                            <!-- /.panel-heading -->
                            <div id="classlist-wrapper" class="panel-collapse collapse in">
                                <div class="panel-body classlist-info" id="classlist-table-wrapper">
                                    <table id="classlist-table" class="table display hidden" cellpadding="0">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>First</th>
                                                <th>Last</th>
                                                <th>Email</th>
                                                <th>SID</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                                <!-- /.panel-body !-->
                            </div>
                            <!-- /.panel-collapse !-->
                        </div>
                    </div>
                </div>

                <!-- Participant Panel !-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-list fa-fw"></i>Participant
                                <div class="pull-right">
                                    <a data-toggle="collapse" data-target="#participant-wrapper">
                                        <i class="fa fa-minus fa-fw"></i>
                                    </a>
                                </div>

                            </div>
                            <!-- /.panel-heading -->
                            <div id="participant-wrapper" class="panel-collapse collapse in">
                                <!--<div class="btn btn-info" id="select-all"> Select All</div>-->
                                <div class="panel-body participant-info" id="participant-table-wrapper">
                                    <table id="participant-table" class="table display hidden" cellpadding="0">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>First</th>
                                                <th>Last</th>
                                                <th>Email</th>
                                                <th>LMSID</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>

                                <!-- /.panel-body !-->
                            </div>
                            <!-- /.panel-collapse !-->
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap Dashboard JavaScript -->
    <script src="<?php echo URL; ?>js/sb-admin-2.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL; ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables Plugin JavaScript -->
    <script src="<?php echo URL; ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo URL; ?>bower_components/datatables/media/js/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
        var url = '<?php echo URL; ?>';
    </script>

    <script src="<?php echo URL; ?>js/buttons.js"></script>
    <script src="<?php echo URL; ?>js/matching.js"></script>


</body>

</html>
