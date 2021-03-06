<?php
/**
 * Created by Nathan Healea.
 * Project: MineDash
 * File: dashboard-base.php
 * Date: 7/14/16
 * Time: 9:09 AM
 */
?>
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

    <!-- Custom CSS !-->
    <link href="<?php echo URL; ?>css/master.css" rel="stylesheet" type="text/css">

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
                        <h1 class="page-header">Session</h1>
                    </div>

                </div>

                <!-- List Courses -->
                <div class="row">
                    <div class="col-lg-12">
                        <table id="session-table" class="table">
                          <thead>
                              <tr>
                                <th>Id</th>
                                <th>Acronym</th>
                                <th>CRN</th>
                                <th>Source Id </th>
                                <th>Date Created </th>
                                <th>Options</th>
                            </tr>
                        </thead>
                    </table>
                </div>

            </div>

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?php echo URL; ?>bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo URL; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Bootstrap admin JavaScript !-->
        <script src="<?php echo URL; ?>js/sb-admin-2.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo URL; ?>bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables Plugin JavaScript -->
        <script src="<?php echo URL; ?>bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo URL; ?>bower_components/datatables/media/js/dataTables.bootstrap.js"></script>

        <!-- Custom Theme JavaScript -->
        <script>
            var url = '<?php echo URL; ?>';
            var data = JSON.parse('<?php echo $sessionList; ?>');
            console.log(data);
            $(document).ready(function () {
                for(var d in data){
                    data[d]['options'] = '<a href="'+ url + 'dashboard/sessionDetail/' + data[d]['id'] + '"class="btn btn-default">Select</a>'
                    + '<a href="'+ url + 'dashboard/sessionEdit/' + data[d]['id'] + '"class="btn btn-warning">Edit</a>'
                    + '<a href="'+ url + 'dashboard/sessionDelete/' + data[d]['id'] + '"class="btn btn-danger">Delete</a>';

                }

                $('#session-table').dataTable({
                    scrollY: 650,
                    destroy: true,
                    bPaginate: false,
                    stripeClasses: [],
                    data: data,
                    "columns": [
                    {"data": "id"},
                    {"data": "acronym"},
                    {"data": "crn"},
                    {"data": "source_id"},
                    {"data": "date_created"},
                    {"data": "options"}
                    ]
                });

            });
        </script>
        <script src="<?php echo URL; ?>libs/dashboard/js/controls.js"></script>

    </body>

    </html>
