<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

$query = "DELETE FROM CART";  

$sql = oci_parse($dbc, $query);  
$row = oci_execute($sql, OCI_DEFAULT);
 
if($row)  
	{
		oci_commit($dbc);
		print '<script>window.location.assign("fcustHome.php");</script>';
	}

	
oci_close();

?>