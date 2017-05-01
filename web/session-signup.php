<?php
if($c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe"))
{

  $sql = oci_parse($c, "select S_YEAR,S_DAY,S_MONTH, S_NUM, ATTENDENCE, CANCELLED from sessions");
  oci_execute($sql);

}
else
{
    $err = oci_error();
    echo "Connection failed." . $err[text];
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
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
         <a class="navbar-brand" href="/index.php">Fred Obs</a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li><a href="/index.php">Home</a></li>
           <li><a href="#about">About</a></li>
           <li class="active"><a href="/session-signup.php">Session Signup</a></li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
   </nav>


    <div class="container">
      <div class="table-responsive" style="margin-top: 100px;">
            <table class="table ">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Session #</th>
                  <th>Attendance</th>
                  <th>Cancelled?</th>
                  <th>Signup</th>
                  <th>View</th>
                </tr>
              </thead>
              <tbody>
                <?php while (($row = oci_fetch_array($sql, OCI_BOTH)) != false) { ?>
                  <tr>
                    <td><?php echo $row[2].'/'.$row[1].'/'.$row[0] ?> </td>
                    <td><?php echo $row[3] ?></td>
                    <td class="attendance"><?php echo $row[4].'/10' ?></td>
                    <td><?php echo $row[5] ?></td>
                    <td><?php if($row[4] < 10 && $row[5] != 'Y' ){?>
                      <button type="button" class="btn btn-primary signup" id="<?php echo $row[0].' '.$row[2].' '.$row[1].' '.$row[3];  ?>">Signup</button>                      <?php }else{?><button type="button" class="disabled btn btn-primary signup">Signup</button><?php } ?>
                    </td>
                    <td><?php if($row[5] != 'Y'){ ?> <button type="button" class="btn btn-primary view" id="<?php echo $row[0].' '.$row[2].' '.$row[1].' '.$row[3];  ?>">View</button> <?php }else{ ?> <button type="button" class="disabled btn btn-primary view">View</button><?php }?></td>
                  </tr>
              <?php  }
                ?>


              </tbody>
            </table>
    </div>
    <div class="table-responsive">
    <table class="table viewTable" style="display:none;">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
        </tr>
      </thead>
      <tbody id="view-table">
      </tbody>
    </table>
  </div>
  </body>
</html>

<script type="text/javascript">
$( document ).ready(function() {
  var userid = '<?php echo $_GET['userid'] ?>';
  $('.signup').click(function(event){
    if(!$(event.target).hasClass('disabled'))
    {
    $.get( "ses-signup.php", { userid: userid, sessionid: event.target.id }, function( data ) {
      $el = $(event.target).parent().parent().find('.attendance');
      var at = $el.html().split('/');
      var newAt = parseInt(at[0]) + 1;
      $(event.target).parent().parent().find('.attendance').html(newAt + '/10');
      if(newAt == 10)
      {
        $(event.target).addClass('disabled');
      }
    });
    }
  });

  $('.view').click(function(event){
    $.getJSON("ses-view.php", {userid: userid, sessionid: event.target.id}, function(data){
      $('#view-table').empty();
      for(var it = 0; it< 10; it++)
      {
        if(it < data.length)
        {
          var fname = data[it].fname;
          var lname = data[it].lname;
        }
        else
        {
          var fname = '<p></p>';
          var lname = '<p></p>';
        }
        $('#view-table').append('<tr><td>' + fname + '</td>'
                                +'<td>' + lname + '</td></tr>');
      }
      if(!$('#viewTable').is(':visible'))
      {
        $('.viewTable').css('display','block');
      }
    });
  });
});
</script>
