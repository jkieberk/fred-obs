<?php

  $id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
         <a class="navbar-brand" href="/nav.php?id=<?php echo $id ?>">Fred Obs</a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li class="active"><a href="">Home</a></li>
           <li><a href="HTTP://BIT.LY/fredobs">About</a></li>
           <li><a href="/session-signup.php?id=<?php echo $id ?>">Session Signup</a></li>
          <li><a href="/admin.php?id=<?php echo $id ?>">Admin Tools</a></li>
         </ul>
       </div><!--/.nav-collapse -->
     </div>
    </nav>


   <div class="container theme-showcase" role="main" style="margin-top:100px;">
     <div class="jumbotron" style="background-image: url(Observatory-for-web.jpg)">
          <h1>Fred Obs</h1>
        </div>
   <div class="row">
     <div class="col-sm-4">
     </div>
    <div class="col-sm-4">
          <div class="list-group">
            <a href="session-signup.php?id=<?php echo $id ?>" class="list-group-item">Session Signup</a>
            <a href="HTTP://BIT.LY/fredobs" class="list-group-item">About</a>
            <a href="/admin.php?id=<?php echo $id ?>" class="list-group-item">Admin Tools</a>
            <a href="" class="list-group-item">Viewing Data</a>
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
        </div>
  </div>
</div>
  </body>
</html>
