<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

$product = $_GET["prod_id"];
//Delete picture in directory
$sql = oci_parse($dbc,"SELECT * FROM PRODUCT WHERE PROD_ID = '$product'");
	
oci_execute($sql);
$row = oci_fetch_array($sql);

if(oci_num_rows($sql) > 0)  
{
	unlink("upload/".$row['PROD_PIC']);
}

//Delete data in database
$query = "DELETE FROM PRODUCT WHERE PROD_ID = '$product'";  

$sql = oci_parse($dbc, $query);  
$row = oci_execute($sql, OCI_DEFAULT);
 
if($row)  
	{
		oci_commit($dbc);
		print '<script>alert("The product are successfully deleted!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
	}

	
oci_close();

?>