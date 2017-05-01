<?php

    if($c = oci_connect("jamison", "jamison", "141.238.9.4:1521/xe"))
    {
        echo "Successfully connected to Oracle.\n";
        oci_close($c);
    }
    else
    {
        $err = oci_error();
        echo "Connection failed." . $err[text];
    }
?>
