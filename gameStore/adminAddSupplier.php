<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

//Insert next value for product id
$sql = oci_parse($dbc,"SELECT MAX(SUPP_ID) AS TOTAL_SUPP FROM SUPPLIER");

	oci_execute($sql);
			
	$row = oci_fetch_array($sql);

	if(oci_num_rows($sql) > 0)  
	{
		$supp_id = $row["TOTAL_SUPP"];
	}

$supp_id = $supp_id + 1;
$supp_name = $_POST['SUPP_NAME'];
$supp_phone = $_POST['SUPP_PHONE'];
$supp_web = $_POST['SUPP_WEB'];
$supp_address = $_POST['SUPP_ADDRESS'];

$query = "INSERT INTO SUPPLIER VALUES ('$supp_id','$supp_name','$supp_phone','$supp_web','$supp_address') ";

$objParse = oci_parse($dbc, $query);  
$objExecute = oci_execute($objParse);  

if($objExecute)  
{  
oci_commit($dbc); //*** Commit Transaction ***//  
print '<script>alert("The Supplier is added!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
}  
else  
{  
oci_rollback($dbc); //*** RollBack Transaction ***//  
$e = oci_error($objParse);  
echo "Error Save [".$e['message']."]";
print '<script>window.location.assign("fadminAddSupplier.php");</script>';
}  
  
oci_close($dbc);
?>