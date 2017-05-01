<?php

$email = $_GET['email'];

$c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe");
$sql = oci_parse($c, 'SELECT USER_ID
                        FROM ACCOUNTS
                        WHERE EMAIL=:email');
oci_bind_by_name($sql, ':email', $email);
oci_execute($sql);
$id = oci_fetch_array($sql)[0];

echo $id;

 ?>
