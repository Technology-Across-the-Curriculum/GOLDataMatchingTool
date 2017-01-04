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
    <link rel="stylesheet" href="<?php echo URL; ?>libs/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap Admin CSS -->
    <link href="<?php echo URL; ?>libs/bootstrap-admin/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">

    <!-- MetisMenu CSS -->
    <link href="<?php echo URL; ?>libs/metisMenu/dist/metisMenu.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo URL; ?>libs/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">


    <!-- Custom Fonts -->
    <link href="<?php echo URL; ?>libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <h1>Details: <?php echo $sectionInfo->acronym; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3"><p>CRN: <?php echo $sectionInfo->crn; ?></p></div>
                <div class="col-lg-3"><p>Section: <?php echo $sectionInfo->code; ?></p></div>
                <div class="col-lg-3"><p>Term: <?php echo $sectionInfo->term_code; ?></p></div>
                <div class="col-lg-3"><p>ALT Term: <?php echo $sectionInfo->alt_term_code; ?></p></div>
            </div>
            <div class="row">
                <div class="col-lg-4"><p>Classroom: <?php echo $sectionInfo->name; ?></p></div>
            </div>


            <!-- CLasslist -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Classlist
                            <div class="pull-right">
                                <a data-toggle="collapse" data-target="#wordsalad-summary-wrapper">
                                    <i class="fa fa-minus fa-fw"></i>
                                </a>
                            </div>

                        </div>
                        <!-- /.panel-heading -->
                        <div id="classlist-wrapper" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <table id="classlist-table" class="table">
                                        <thead>
                                        <?php
                                        foreach ($studentKeys as $key)
                                            echo '<th>' . $key . '</th>'
                                        ?>
                                        <th>Options</th>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($studentList as $student) {
                                            ?>
                                            <tr>
                                                <?php foreach ($student as $key => $value) {
                                                    echo '<td>' . $value . '</td>';
                                                } ?>
                                                <td>
                                                    <a href="<?php echo URL; ?>course/select/<?php echo htmlspecialchars($student->id, ENT_QUOTES, 'UTF-8') ?>"
                                                       class="btn btn-default">Select</a>
                                                    <a href="<?php echo URL; ?>course/edit/<?php echo htmlspecialchars($student->id, ENT_QUOTES, 'UTF-8') ?>"
                                                       class="btn btn-warning">Edit</a>
                                                    <a href="<?php echo URL; ?>course/delete/<?php echo htmlspecialchars($student->id, ENT_QUOTES, 'UTF-8') ?>"
                                                       class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- List sessions -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Session
                            <div class="pull-right">
                                <a data-toggle="collapse" data-target="#wordsalad-summary-wrapper">
                                    <i class="fa fa-minus fa-fw"></i>
                                </a>
                            </div>

                        </div>
                        <!-- /.panel-heading -->
                        <div id="session-wrapper" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <table id="session-table" class="table">
                                        <thead>
                                        <?php
                                        foreach ($sessionKeys as $key)
                                            echo '<th>' . $key . '</th>'
                                        ?>
                                        <th>Options</th>
                                        </thead>
                                        <tbody>

                                        <?php
                                        foreach ($sessionList as $session) {
                                            ?>
                                            <tr>
                                                <?php foreach ($session as $key => $value) {
                                                    echo '<td>' . $value . '</td>';
                                                } ?>
                                                <td>
                                                    <a href="<?php echo URL; ?>course/select/<?php echo htmlspecialchars($session->id, ENT_QUOTES, 'UTF-8') ?>"
                                                       class="btn btn-default">Select</a>
                                                    <a href="<?php echo URL; ?>course/edit/<?php echo htmlspecialchars($session->id, ENT_QUOTES, 'UTF-8') ?>"
                                                       class="btn btn-warning">Edit</a>
                                                    <a href="<?php echo URL; ?>course/delete/<?php echo htmlspecialchars($session->id, ENT_QUOTES, 'UTF-8') ?>"
                                                       class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php } ?>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo URL; ?>libs/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>libs/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootstrap admin JavaScript !-->
    <script src="<?php echo URL; ?>libs/bootstrap-admin/js/sb-admin-2.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL; ?>libs/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables Plugin JavaScript -->
    <script src="<?php echo URL; ?>libs/datatables/media/js/jquery.dataTables.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
        var url = '<?php echo URL; ?>';
        $(document).ready(function () {
            $('#session-table').DataTable();
            $('#classlist-table').DataTable();
        });
    </script>
    <script src="<?php echo URL; ?>libs/dashboard/js/controls.js"></script>

</body>

</html>
