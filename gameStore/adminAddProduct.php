<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

//Insert next value for product id
$sql = oci_parse($dbc,"SELECT MAX(PROD_ID) AS TOTAL_PROD FROM PRODUCT");

	oci_execute($sql);
			
	$row = oci_fetch_array($sql);

	if(oci_num_rows($sql) > 0)  
	{
		$prodid = $row["TOTAL_PROD"];
	}

$UploadedFileName=$_FILES['PROD_PIC']['name'];
if($UploadedFileName!='')
{
  $upload_directory = "upload/"; //This is the folder which you created just now
  $TargetPath=time().$UploadedFileName;
  if(move_uploaded_file($_FILES['PROD_PIC']['tmp_name'], $upload_directory.$TargetPath))
  {    
	$prodid = $prodid + 1;
	$prodname = $_POST['PROD_NAME'];
	$prodprice = $_POST['PROD_PRICE'];
	$prodsupplier = $_POST['SUPP_ID'];

	$query = oci_parse($dbc,"INSERT INTO PRODUCT VALUES ('$prodid','$prodname','$prodprice','$prodsupplier', '$TargetPath')");  

	$objExecute = oci_execute($query);  

	if($objExecute)  
	{  
		oci_commit($dbc); 
		print '<script>alert("The Product is added!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
	}  
	else  
	{  
		oci_rollback($dbc);
		$e = oci_error($objParse);  
		echo "Error Save [".$e['message']."]"; 
		print '<script>window.location.assign("fadminAddProduct.php");</script>'; 
	}                 
  }
}

oci_close($dbc);
?>