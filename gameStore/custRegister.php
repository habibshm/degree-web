<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

$cust_ic = $_POST['CUST_IC'];
$cust_name = $_POST['CUST_NAME'];
$cust_email = $_POST['CUST_EMAIL'];
$cust_pass = $_POST['CUST_PASSWORD'];
$cust_phone = $_POST['CUST_PHONE'];
$cust_address = $_POST['CUST_ADDRESS'];	

$query = "INSERT INTO CUSTOMER VALUES ('$cust_ic','$cust_name','$cust_email','$cust_pass', '$cust_phone', '$cust_address')";  

$objParse = oci_parse($dbc, $query);  
$objExecute = oci_execute($objParse);  

if($objExecute)  
{  
oci_commit($dbc); //*** Commit Transaction ***//  
print '<script>alert("Successfully registered!");</script>';
		print '<script>window.location.assign("fCustLogin.php");</script>';
}  
else  
{  
oci_rollback($dbc); //*** RollBack Transaction ***//  
$e = oci_error($objParse);  
echo "Error Save [".$e['message']."]"; 
print '<script>window.location.assign("fcustRegister.php");</script>'; 
}  
  
oci_close($dbc);
?>