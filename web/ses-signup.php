<?php
  $c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");

  $userid = $_GET['userid'];
  $sessionid = $_GET['sessionid'];
  $strArray = explode(' ', $sessionid);

  $sql = oci_parse($c, 'Update SESSIONS
                        SET ATTENDENCE = ATTENDENCE +1
                        WHERE S_MONTH= :month AND S_DAY= :day AND S_YEAR= :year AND S_NUM=:num');
  $year = $strArray[0];
  $month = $strArray[1];
  $day = $strArray[2];
  $num = $strArray[3];

  oci_bind_by_name($sql, ":month", $month);
  oci_bind_by_name($sql, ":day", $day);
  oci_bind_by_name($sql, ":year", $year);
  oci_bind_by_name($sql, ":num", $num);
  oci_execute($sql);

  $sql = oci_parse($c, 'INSERT INTO ATTENDS(S_MONTH, S_DAY, S_YEAR, S_NUM, USER_ID)
VALUES(:month, :day, :year, :num, :userid)');
oci_bind_by_name($sql, ":month", $month);
oci_bind_by_name($sql, ":day", $day);
oci_bind_by_name($sql, ":year", $year);
oci_bind_by_name($sql, ":num", $num);
oci_bind_by_name($sql, ":userid", $userid);
$ret = oci_execute($sql);
echo $year.' '.$month.' '.$day.' '.$userid;
  //echo $month.'/'.$day.'/'.$year.' '.$num;


?>
