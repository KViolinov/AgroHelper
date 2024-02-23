<?php

$dbhost = "localhost";
$dbuser = "kvbbgcom_kosi";
$dbpass = "kv0889909595";
$dbname = "kvbbgcom_agrohelper";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("falled to connect");
}
?>
