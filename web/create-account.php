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
    <link rel="stylesheet" type="text/css" href="create.css" media="screen" />
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
    <form action="/login.php" method="get">
    <div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-6">
         <div class="row myborder">
             <h4 style="color: #7EB59E; margin: initial; margin-bottom: 10px;">Sign Up Now</h4><hr>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="User Name" name="username" id="UserRegistration_username" type="text">                                                        </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Password" name="password" id="UserRegistration_password" type="password">                                    </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="First Name" name="fname" id="UserRegistration_fname" type="text">
                                               </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Last Name" name="lname" id="UserRegistration_lname" type="text">                                    </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Age" name="age" id="UserRegistration_age" type="text">
            </div>
            <div class="input-group margin-bottom-20 form-control">
                <input size="60" maxlength="255"  placeholder="Student?" name="student" id="UserRegistration_student" type="checkbox" value="yes">
                <label for="UserRegistration_student">Student?</label>

            </div>
            <div class="input-group margin-bottom-20">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                <input size="60" maxlength="255" class="form-control" placeholder="Email" name="email" id="UserRegistration_email" type="email">
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn-u pull-left" type="submit">Sign Up</button>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
      </div>
      <form>
    </div> <!-- /container -->
  </body>
</html>
