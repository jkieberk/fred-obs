<?php
$c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");

$userid = $_GET['userid'];
$sessionid = $_GET['sessionid'];
$strArray = explode(' ', $sessionid);
$sql = oci_parse($c, 'SELECT * from :roster');

$year = $strArray[0];
$month = $strArray[1];
$day = $strArray[2];
$num = $strArray[3];
$roster = "ROSTER_".$month."_".$day."_".$year."_".$num;

$sql = oci_parse($c, 'SELECT * from '.$roster);
oci_execute($sql);

$i = 0;
while (($row = oci_fetch_array($sql, OCI_BOTH)) != false)
{
  $retArray[$i++] = array(
    'fname' => $row[0],
    'lname' => $row[1]
  );
}

echo json_encode($retArray);
?>
