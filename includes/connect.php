<?php

$host="localhost";
$loginName="root";
$logpassword=""; 
$db_name="efcpharmacy"; 
$tbl_name="employee"; 


mysql_connect("$host", "$loginName", "$logpassword")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
?>