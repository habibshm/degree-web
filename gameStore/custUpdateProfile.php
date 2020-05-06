<?php
$dbc=oci_connect('gameStore','1234','localhost/xe');

session_start();
$iccust = $_SESSION['CUST_IC'];

$cust_ic = $_POST['CUST_IC'];
$cust_name = $_POST['CUST_NAME'];
$cust_email = $_POST['CUST_EMAIL'];
$cust_pass = $_POST['CUST_PASSWORD'];
$cust_phone = $_POST['CUST_PHONE'];
$cust_address = $_POST['CUST_ADDRESS'];



$sql = "UPDATE CUSTOMER SET CUST_IC = '$cust_ic', CUST_NAME = '$cust_name', CUST_EMAIL = '$cust_email', CUST_PASSWORD = '$cust_pass', CUST_PHONE = '$cust_phone', CUST_ADDRESS = '$cust_address' WHERE CUST_IC = '$iccust'";
$result = oci_parse($dbc, $sql);
$row = oci_execute($result, OCI_DEFAULT);
		
	if($row)
	{
		oci_commit($dbc);
		print '<script>alert("Your profile are successfully updated!");</script>';
		print '<script>window.location.assign("fcustHome.php");</script>';
	}
	else
	{
		oci_rollback($dbc);
		print '<script>alert("Your profile are not updated!");</script>';
		print '<script>window.location.assign("fcustViewProfile.php");</script>';
	}

oci_close($dbc);
?>