<?php
$c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");

$sql = oci_parse($c, 'delete from accounts where username = \'justin\'');
oci_execute($sql);

$sql = oci_parse($c, 'delete from users where FIRST_NAME=\'justin\'');
oci_execute($sql);

?>
