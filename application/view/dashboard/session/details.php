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
  <link href="<?php echo URL; ?>libs/datatables/media/css/dataTables.bootstrap.css" rel="stylesheet"
  type="text/css">

  <!-- Custom Fonts -->
  <link href="<?php echo URL; ?>libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
              <h1><?php echo $sessionInfo->source_id; ?></h1>
            </div>
          </div>

          <!-- Detail Inforamion !-->
          <div class="row">
            <div class="col-lg-12">
             <div> <?php var_dump($sessionInfo); ?> </div>
             <div> <?php var_dump($participantList); ?> </div>
           </div>
         </div>

         <!-- Participants -->
         <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                Participants
                <div class="pull-right">
                  <a data-toggle="collapse" data-target="#wordsalad-summary-wrapper">
                    <i class="fa fa-minus fa-fw"></i>
                  </a>
                </div>

              </div>
              <!-- /.panel-heading -->
              <div id="participants-wrapper" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="col-lg-12">
                    <table id="participants-table" class="table">
                     <thead>
                      <tr>
                        <th>id</th>
                        <th>First</th>
                        <th>Last</th>
                        <th>Device ID</th>
                        <th>Device Alt Id</th>
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



      <!-- Questions -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Questions
              <div class="pull-right">
                <a data-toggle="collapse" data-target="#wordsalad-summary-wrapper">
                  <i class="fa fa-minus fa-fw"></i>
                </a>
              </div>

            </div>
            <!-- /.panel-heading -->
            <div id="questions-wrapper" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="col-lg-12">
                  <table id="session-table" class="table">
                   <thead>
                    <tr>
                      <th>Id</th>
                      <th>Question</th>
                      <th>Number of Responces</th>
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
<script src="<?php echo URL; ?>libs/datatables/media/js/dataTables.bootstrap.js"></script>

<!-- Custom Theme JavaScript -->
<script>
  var url = '<?php echo URL; ?>';
  var participants = '<?php  ?>';

  $(document).ready(function () {
    console.log(participants);

        // add in details  buttons for participants table
        for(var p in participants){
          participants[p]['options'] = '<div class="btn btn-default" id="btn-detail-' + participants[p]['id'] + '">Details</div>';

        }

        // Building Participant table
        $('#participants-table').dataTable({     
          scrollY: 450,           
          destroy: true,
          bPaginate: false,
          stripeClasses: [],
          data: participants,
          "columns": [
          {"data": "id"},
          {"data": "first_name"},
          {"data": "last_name"},
          {"data": "device_id"},
          {"data": "device_alt_id"},
          {"data": "options"}
          ]
        });
        
      });
    </script>

  </body>

  </html>

