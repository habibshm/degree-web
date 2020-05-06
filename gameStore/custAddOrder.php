<?php

$dbc = oci_connect('gameStore','1234','localhost/xe');

//Identify which customer
session_start();
$custic = $_SESSION['CUST_IC'];

//Insert next value for order id
$query = oci_parse($dbc,"SELECT MAX(ORDER_ID) AS TOTAL_ORD FROM ORDERS");

	oci_execute($query);
			
	$row = oci_fetch_array($query);

	if(oci_num_rows($query) > 0)  
	{
		$order_id = $row["TOTAL_ORD"];
	}

$order_id = $order_id + 1;

//Insert into order
$sql = "INSERT INTO ORDERS VALUES ('$order_id', sysdate, '$custic')";
		
		$objParse = oci_parse($dbc, $sql);  
		$objExecute = oci_execute($objParse);  

		if($objExecute)  
		{  
			oci_commit($dbc);	
			
			$sql2 = "SELECT * FROM CART";
			
			$objParse2 = oci_parse($dbc, $sql2);  
			oci_execute ($objParse2, OCI_DEFAULT);
	
			while($row2 = oci_fetch_array($objParse2, OCI_BOTH))
			{
				$product = $row2["PROD_ID"];
				
				//Get cart to be insert into product_order
				
				$sql3 = "INSERT INTO PRODUCT_ORDERS VALUES ('$order_id', '$product')";
				
				$objParse3 = oci_parse($dbc, $sql3);  
				$objExecute2 = oci_execute($objParse3);  

				if($objExecute2)  
				{
					oci_commit($dbc);
				}  
				else  
				{  
					oci_rollback($dbc); 
					$err = oci_error($objParse);  
					echo "Error Save [".$err['message']."]"; 
					print '<script>window.location.assign("fcustHome.php");</script>'; 
				}
			}
			print '<script>alert("Thank you for buying with us!");</script>';
			print '<script>window.location.assign("custCancel.php");</script>'; 
			
		}
		else  
		{  
			oci_rollback($dbc);  
			$err = oci_error($objParse);  
			echo "Error Save [".$err['message']."]"; 
			print '<script>window.location.assign("fcustHome.php");</script>'; 
		}
	
	oci_close($dbc);

?>