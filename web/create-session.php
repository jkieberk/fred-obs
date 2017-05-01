<?php
  $c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");
  $max = oci_parse($c, "select max(w_key) from weather");
  oci_execute($max);
  $id = oci_fetch_array($max)[0] + 1;

  $forecast = $_GET['forecast'];
  $humidity = $_GET['humidity'];
  $temperature = $_GET['temperature'];
  $month = $_GET['month'];
  $day = $_GET['day'];
  $year = $_GET['year'];
  $sessionNumber = $_GET['session'];
  $instructor = $_GET['instructor'];

  $sql = oci_parse($c, "INSERT INTO weather(w_key, FORECAST, temperature, humidity)
                        values(:wkey, :forecast, :temperature, :humidity)");

  oci_bind_by_name($sql, ":wkey", $id);
  oci_bind_by_name($sql, ":forecast", $forecast);
  oci_bind_by_name($sql, ":temperature", $temperature);
  oci_bind_by_name($sql, ":humidity", $humidity);
  oci_execute($sql);

  $sql = oci_parse($c, "INSERT INTO SESSIONS(S_MONTH, S_DAY, S_YEAR, S_NUM, ATTENDENCE, I_ID, CANCELLED, W_KEY)
VALUES(:month, :day, :year, :num, 0, :instructor, 'N', :wkey)");
  oci_bind_by_name($sql, ":month", $month);
  oci_bind_by_name($sql, ":day", $day);
  oci_bind_by_name($sql, ":year", $year);
  oci_bind_by_name($sql, ":num", $sessionNumber);
  oci_bind_by_name($sql, ":instructor", $instructor);
  oci_bind_by_name($sql, ":wkey", $id);

  $ret = oci_execute($sql);

  $roster = "ROSTER_".$month."_".$day."_".$year."_".$sessionNumber;
  echo $roster;
  $sql = oci_parse($c, 'CREATE VIEW '.$roster.'(FIRST_NAME, LAST_NAME) AS SELECT U.FIRST_NAME, U.LAST_NAME FROM ATTENDS A, USERS U WHERE A.USER_ID=U.USER_ID AND A.S_MONTH='.$month.' AND A.S_DAY='.$day.' AND A.S_YEAR='.$year.' AND A.S_NUM='.$sessionNumber);
$succ =  oci_execute($sql);

echo $succ;
 ?>
