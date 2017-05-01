<?php
$c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");
// Canceled vs Total Sessions
$sql = oci_parse($c, "select count(*)
                      from sessions
                      where cancelled='Y'");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$numCancel = $row[0];

$sql = oci_parse($c, "select count(*)
                      from sessions");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$totalSessions = $row[0];

// Students vs Not-Students
$sql = oci_parse($c, "select count (*)
                      from users
                      where student='Y'");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$numStudents = $row[0];

$sql = oci_parse($c, "select count (*)
                      from users
                      where student ='N'");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$notStudents = $row[0];

// Average # Attending Per Session
$sql = oci_parse($c, "select AVG(attendence)
                        from sessions
                        where attendence>0");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$avgAttendance = $row[0];
// Adults vs Children
$sql = oci_parse($c, "select count (*)
                    from Users
                    where adult= 'Y'");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$numAdults = $row[0];

$sql = oci_parse($c, "select count (*)
                        from users
                        where adult='N'");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$numChildren = $row[0];
// Days Above 65 Degrees
$sql = oci_parse($c, "select count (*)
                      from WEATHER
                      WHERE  TEMPERATURE >65");
oci_execute($sql);
$row = oci_fetch_array($sql, OCI_BOTH);
$above65 = $row[0];

$id = $_GET['id'];

 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <style>
      @import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
    body{margin-top:20px;}
    .fa-fw {width: 2em;}
  </style>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="/nav.php?id=<?php echo $id ?>">Fred Obs</a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li><a href="/nav.php?id=<?php echo $id ?>">Home</a></li>
           <li><a href="HTTP://BIT.LY/fredobs">About</a></li>
           <li><a href="/session-signup.php?id=<?php echo $id ?>">Session Signup</a></li>
          <li class="active"><a href="/admin.php?id=<?php echo $id ?>">Admin Tools</a></li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
    </nav>


    <div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked admin-menu">
              <li  class="active"><a href="http://www.jquery2dotnet.com" data-target-id="create-session"><i class="fa fa-list-alt fa-fw"></i>Create Session</a></li>
                <li><a href="#" data-target-id="cancel-session"><i class="fa fa-fw fa-ban"></i>Cancel Session</a></li>
                <li><a href="http://www.jquery2dotnet.com" data-target-id="analytics"><i class="fa fa-bar-chart-o fa-fw"></i>Analytics</a></li>
                <li><a href="http://www.jquery2dotnet.com" data-target-id="table"><i class="fa fa-eye fa-fw"></i>Report Viewing</a></li>
                <li><a href="http://www.jquery2dotnet.com" data-target-id="charts"><i class="fa fa-star fa-fw"></i>New Object</a></li>

            </ul>
        </div>

        <div class="col-md-9 well admin-content" id="create-session">
          <form id="session-form">
            <div class="brand"><h4 style="margin-bottom: 15px;margin-left:-14px; ">Weather</h4>
            <div class="row">
              <select name="forecast" class="custom-select col-md-2">
                <option selected>Forecast</option>
                <option value="Sunny">Sunny</option>
                <option value="Cloudy">Cloudy</option>
                <option value="Rainy">Rainy</option>
              </select>
              <div class="col-md-2">
                <input type="text" name="humidity" class="form-control" placeholder="humidity">
              </div>
              <div class="col-md-3">
                <input type="text" name="temperature" class="form-control" placeholder="temperature">
              </div>
            </div>
          </div>
          <div class="brand"><h4 style="margin-bottom: 15px; margin-left:-14px;">Date</h4>
          <div class="row" style="margin-top: 10px;">
            <div class="col-md-2" style="margin-left:-14px; margin-right:14px;">
              <input type="text" name="month" class="form-control" placeholder="month">
            </div>

            <div class="col-md-2">
              <input type="text" name="day" class="form-control" placeholder="day">
            </div>
            <div class="col-md-2">
              <input type="text" name="year" class="form-control" placeholder="year">
            </div>
            <div class="col-md-2">
              <input type="text" name="session" class="form-control" placeholder="session #">
            </div>
          </div>
          <div class="brand"><h4 style="margin-bottom: 15px; margin-left:-14px;">Details</h4>
          <div class="row" style="margin-left: -14px; margin-top:10px;">
            <div class="col-md-3" style="margin-left: -14px;">
              <input type="text" name="instructor" class="form-control" placeholder="instructor #">
            </div>
          </div>
          </div>
          </div>
            <button type="button" class="btn btn-primary create-session" style="margin-top:10px;margin-left:-14px;">Submit</button>
        </form>
        </div>


        <div class="col-md-9 well admin-content" id="cancel-session">
            <form id="cancel-form">
              <div class="brand"><h4 style="margin-bottom: 15px; margin-left:-14px;">Date</h4>
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-2" style="margin-left:-14px; margin-right:14px;">
                  <input type="text" name="month" class="form-control" placeholder="month">
                </div>

                <div class="col-md-2">
                  <input type="text" name="day" class="form-control" placeholder="day">
                </div>
                <div class="col-md-2">
                  <input type="text" name="year" class="form-control" placeholder="year">
                </div>
                <div class="col-md-2">
                  <input type="text" name="session" class="form-control" placeholder="session #">
                </div>
              </div>
              </div>
              <buttn type="button" class="btn btn-primary cancel-session" style="margin-top:10px;margin-left:-14px;">Cancel</button>

            </form>
        </div>
        <div class="col-md-9 well admin-content" id="analytics">
          <div class="table-responsive">
          <table id="analytics-table" class="table table-striped">
            <tbody id="view-table">
              <tr>
                <td>Canceled vs Total Sessions</td>
                <td><?php echo $numCancel.'/'.$totalSessions ?></td>
              </tr>
              <tr>
                <td>Students vs Not-Students</td>
                <td><?php echo $numStudents.'/'.$notStudents ?></td>
              </tr>
              <tr>
                <td>Average # Attending Per Session</td>
                <td><?php echo $avgAttendance ?></td>
              </tr>
              <tr>
                <td>Adults vs Children</td>
                <td><?php echo $numAdults.'/'.$numChildren ?></td>
              </tr>
              <tr>
                <td>Days Above 65 Degrees</td>
                <td><?php echo $above65 ?></td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>

    </div>
</div>

  </body>
</html>

<script type="text/javascript">
$(document).ready(function()
{
  var navItems = $('.admin-menu li > a');
  var navListItems = $('.admin-menu li');
  var allWells = $('.admin-content');
  var allWellsExceptFirst = $('.admin-content:not(:first)');

  allWellsExceptFirst.hide();
  navItems.click(function(e)
  {
      e.preventDefault();
      navListItems.removeClass('active');
      $(this).closest('li').addClass('active');

      allWells.hide();
      var target = $(this).attr('data-target-id');
      $('#' + target).show();
  });

  $('.create-session').click(function(event){
    var parameters = $('#session-form').serialize();
    $.get("create-session.php", parameters, function(data){
      alert('created');
    });
  });
 $('.cancel-session').click(function(event){
   var dat = $('#cancel-form').serialize();
   $.get('cancel-session.php', dat, function(data){
     alert(data);
   });
 });

});
</script>
