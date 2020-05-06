<?php
$dbc=oci_connect('gameStore','1234','localhost/xe');

$admin_ic = $_POST['ADMIN_IC'];
$admin_name = $_POST['ADMIN_NAME'];
$admin_email = $_POST['ADMIN_EMAIL'];
$admin_pass = $_POST['ADMIN_PASSWORD'];
$admin_phone = $_POST['ADMIN_PHONE'];
$admin_address = $_POST['ADMIN_ADDRESS'];

session_start();
$e = $_SESSION['email'];

$sql = "UPDATE ADMIN SET ADMIN_IC = '$admin_ic', ADMIN_NAME = '$admin_name', ADMIN_EMAIL = '$admin_email', ADMIN_PASSWORD = '$admin_pass', ADMIN_PHONE = '$admin_phone', ADMIN_ADDRESS = '$admin_address' WHERE ADMIN_EMAIL = '$e'";
$result = oci_parse($dbc, $sql);
$row = oci_execute($result, OCI_DEFAULT);
		
	if($row)
	{
		oci_commit($dbc);
		print '<script>alert("The admin details are successfully updated!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
	}
	else
	{
		oci_rollback($dbc);
		print '<script>alert("The admin details are not updated");</script>';
		print '<script>window.location.assign("fadminViewProfile.php");</script>';
	}

oci_close($dbc);
?>