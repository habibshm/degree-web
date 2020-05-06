<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

$supplier = $_GET["sup_id"];
$query = "DELETE FROM SUPPLIER WHERE SUPP_ID = '$supplier'";  

$sql = oci_parse($dbc, $query);  
$row = oci_execute($sql, OCI_DEFAULT);
 
if($row)  
	{
		oci_commit($dbc);
		print '<script>alert("The supplier are successfully deleted!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
	}

	
oci_close();

?>