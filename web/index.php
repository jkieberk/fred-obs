<?php
  $id = $_GET['id'];
  if($id)
  {
       header( 'Location: nav.php'.'?id='.$id ) ;
  }

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


   <div class="jumbotron" style="background-image: url(Observatory-for-web.jpg)">
        <h1>Fred Obs</h1>
        <p>Something Something Description Here</p>
      </div>
    <div class="container">

      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUser" class="sr-only">Username</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" >
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
          <label>
            <a href="create-account.php"><button type="button" name="new user" class="btn">New User?</button></a>
          </label>
        </div>
      </form>
      <button id="formSub" class="btn btn-lg btn-primary btn-block">Sign in</button>


    </div> <!-- /container -->
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('#formSub').click(function(event){
      var dat = $('.form-signin').serialize();
      $.get("login-user.php", dat,function(data){
        if(data)
        {
          window.location = "nav.php?id=" + data;
        }
        else{
          alert('Wrong User, pass combination');
        }
      });
    });
  });
</script>
