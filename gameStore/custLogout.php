<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

$query = "DELETE FROM CART";  

$sql = oci_parse($dbc, $query);  
$row = oci_execute($sql, OCI_DEFAULT);
 
if($row)  
	{
		oci_commit($dbc);
	}

// remove all session variables
session_start();

if(session_destroy())
{
	print '<script>alert("You have logged out!");</script>';
	print '<script>window.location.assign("index.php");</script>';
}
oci_close();
?>