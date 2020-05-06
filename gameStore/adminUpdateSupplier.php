<?php

$dbc=oci_connect('gameStore','1234','localhost/xe');

$sup_id = $_POST['SUPP_ID'];
$sup_name = $_POST['SUPP_NAME'];
$sup_phone = $_POST['SUPP_PHONE'];
$sup_web = $_POST['SUPP_WEB'];
$sup_address = $_POST['SUPP_ADDRESS'];

session_start();


$sql = "UPDATE SUPPLIER SET SUPP_ID = '$sup_id', SUPP_NAME = '$sup_name', SUPP_PHONE = '$sup_phone', SUPP_WEB = '$sup_web', SUPP_ADDRESS = '$sup_address' WHERE SUPP_ID = '$sup_id'";
$result = oci_parse($dbc, $sql);
$row = oci_execute($result, OCI_DEFAULT);
		
	if($row)
	{
		oci_commit($dbc);
		print '<script>alert("The supplier details are successfully updated!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
	}
	else
	{
		oci_rollback($dbc);
		print '<script>alert("The supplier details are not updated");</script>';
		print '<script>window.location.assign("fadminViewSupplier.php");</script>';
	}

oci_close($dbc);
?>