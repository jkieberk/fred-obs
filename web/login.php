<?php
if($c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe"))
{

  $max = oci_parse($c, "select max(user_id) from users");
  oci_execute($max);
  $id = oci_fetch_array($max)[0] + 1;
  echo $id;

  if($_GET['student'])
  {
    $student = 'Y';
  }
  else
  {
    $student = 'N';
  }
  $user = $_GET['username'];
  $pass = $_GET['password'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $age   = $_GET['age'];
  $email = $_GET['email'];

  echo  'user'.$user;
  echo "<p></p>";
  echo 'pass '.$pass;
  echo "<p></p>";

  echo 'age '.$age;
  echo "<p></p>";

  echo 'fname '.$fname;
  echo "<p></p>";
  echo 'lanem '.$lname;
  echo "<p></p>";

  if($age >= 18)
  {
    $adult = 'Y';
  }
  else
  {
    $adult = 'N';
  }
  echo 'adult '.$adult;
  echo "<p></p>";
  echo 'student '.$student;
  echo "<p></p>";
  $sql = oci_parse($c, 'INSERT INTO USERS (USER_ID, FIRST_NAME, LAST_NAME, AGE, STUDENT, ADULT)
    VALUES(:id, :fname, :lname, :age, :student, :adult )');
  oci_bind_by_name($sql, ":id", $id);
  oci_bind_by_name($sql, ":fname", $fname);
  oci_bind_by_name($sql, ":lname", $lname);
  oci_bind_by_name($sql, ":age", $age);
  oci_bind_by_name($sql, ":student", $student);
  oci_bind_by_name($sql, ":adult", $adult);
  oci_execute($sql);

  $stand = 'standard';
  $sql = oci_parse($c, 'INSERT INTO ACCOUNTS (username,password, email, status, user_id)
    VALUES(:username, :password, :email, :status, :userid )');
    oci_bind_by_name($sql, ":username", $user);
    oci_bind_by_name($sql, ":password", $pass);
    oci_bind_by_name($sql, ":email", $email);
    oci_bind_by_name($sql, ":status", $stand);
    oci_bind_by_name($sql, ":userid", $id);



  oci_execute($sql);
  //echo oci_fetch_array($sql)[1];


}
else
{
    $err = oci_error();
    echo "Connection failed." . $err[text];
}
?>
