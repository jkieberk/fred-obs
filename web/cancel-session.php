<?php
  $session = $_GET['session'];
  $month = $_GET['month'];
  $day = $_GET['day'];
  $year = $_GET['year'];
  $params =  $month.', '.$day.', '.$year.', '.$session;

  $c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");
  $sql = oci_parse($c, 'BEGIN
                        cancel_update('.$params.');
                        END;');

  $ret = oci_execute($sql);
  echo $ret;
 ?>
