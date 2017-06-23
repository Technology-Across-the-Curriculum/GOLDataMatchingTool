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

  <!-- Bootstrap Admin CSS -->
  <link href="<?php echo URL; ?>css/sb-admin-2.min.css" rel="stylesheet" type="text/css">

  <!-- MetisMenu CSS -->
  <link href="<?php echo URL; ?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet" type="text/css">

  <!-- DataTables CSS -->
  <link href="<?php echo URL; ?>bower_componentsdatatables/media/css/dataTables.bootstrap.css" rel="stylesheet"
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
                        <tr>
                          <th>Id</th>
                          <th>First</th>
                          <th>Middle</th>
                          <th>Last</th>
                          <th>Student Id</th>
                          <th>Email</th>
                          <th>Consent</th>
                          <th>Grade</th>
                          <th>Score</th>
                          <th>Options</th>
                        </tr>
                      </thead>
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
                      <tr>
                        <th>Id</th>
                        <th>Guid</th>
                        <th>Source Id</th>
                        <th>Session type</th>
                        <th>Date Created</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>


<!-- /#wrapper -->

<!-- modal !-->
<div id="student-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="btn-modal-exit" type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Participants Match To Student</h4>
        </div>


        <div class="modal-body">
          <table id="student-data" class="display" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>id</th>
                <th>first</th>
                <th>last</th>
                <th>lmsid</th>
                <th>email</th>
                <th>option</th>
              </tr>
            </thead>
          </table>
        </div>

        <div class="modal-footer">
          <button id="btn-modal-close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="btn-modal-save" type="button" class="btn btn-primary"  >Save changes</button>
        </div>

      </div>
    </div>
  </div>






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
    var sectionId = '<?php echo $sectionID; ?>';
    var sessionList = JSON.parse('<?php echo $sessionList; ?>');
    var studentList = JSON.parse('<?php echo $studentList; ?>');

    console.log(sectionId);
    $(document).ready(function () {
      // add in session buttons for table
      for(var s in studentList){
        studentList[s]['options'] = '<div class="btn btn-default" id="btn-detail-' + studentList[s]['id'] + '">Details</div>';

      }

      // creating classlist table
      $('#classlist-table').dataTable({
        scrollY: 450,
        destroy: true,
        bPaginate: false,
        stripeClasses: [],
        data: studentList,
        "columns": [
        {"data": "id"},
        {"data": "first_name"},
        {"data": "middle_name"},
        {"data": "last_name"},
        {"data": "student_id"},
        {"data": "email"},
        {"data": "consent"},
        {"data": "grade"},
        {"data": "score"},
        {"data": "options"}
        ]
      });

        // add in session buttons for table
        for(var s in sessionList){
          sessionList[s]['options'] = '<a href="'+ url + 'dashboard/sessionDetail/' + sessionList[s]['id'] + '"class="btn btn-default">Select</a>'
          + '<a href="'+ url + 'dashboard/sessionEdit/' + sessionList[s]['id'] + '"class="btn btn-warning">Edit</a>'
          + '<a href="'+ url + 'dashboard/sessionDelete/' + sessionList[s]['id'] + '"class="btn btn-danger">Delete</a>';

        }

        // create session table
        $('#session-table').dataTable({
          scrollY: 450,
          destroy: true,
          bPaginate: false,
          stripeClasses: [],
          data: sessionList,
          "columns": [
          {"data": "id"},
          {"data": "guid"},
          {"data": "source_id"},
          {"data": "session_type"},
          {"data": "date_created"},
          {"data": "options"}
          ]
        });


      });
    </script>
    <script src="<?php echo URL; ?>public/js/dashboard-controls.js"></script>

  </body>

  </html>
