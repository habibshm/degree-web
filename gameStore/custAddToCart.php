<?php


$dbc=oci_connect('gameStore','1234','localhost/xe');

//Check Cart

$product = $_GET["prodid"];

$sql = oci_parse($dbc, "SELECT * FROM CART WHERE PROD_ID = '$product'");

oci_execute($sql);

$row = oci_fetch_array($sql);

if (oci_num_rows($sql) > 0)
{
	print '<script>alert("Sorry! You already added this product to cart.");</script>';
	print '<script>window.location.assign("fcustHome.php");</script>';
}

else

{
	//Add To Cart

	$query = "INSERT INTO CART VALUES ('$product')";  

	$objParse = oci_parse($dbc, $query);  
	$objExecute = oci_execute($objParse);  

	if($objExecute)  
	{  
		oci_commit($dbc); //*** Commit Transaction ***//  
		print '<script>alert("Added to cart!");</script>';
		print '<script>window.location.assign("fcustHome.php");</script>';
	}  
	else  
	{  
		oci_rollback($dbc); //*** RollBack Transaction ***//  
		$err = oci_error($objParse);  
		echo "Error Save [".$err['message']."]"; 
		print '<script>window.location.assign("fcustHome.php");</script>'; 
	}  
}
	oci_close($dbc);

?>