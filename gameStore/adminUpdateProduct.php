<?php

$dbc=oci_connect('gameStore','1234','localhost/xe');



$UploadedFileName=$_FILES['PROD_PIC']['name'];
if($UploadedFileName!='')
{
  $upload_directory = "upload/"; //This is the folder which you created just now
  $TargetPath=time().$UploadedFileName;
  if(move_uploaded_file($_FILES['PROD_PIC']['tmp_name'], $upload_directory.$TargetPath))
  {    
	$prod_id = $_POST['PROD_ID'];
	$prod_name = $_POST['PROD_NAME'];
	$prod_price = $_POST['PROD_PRICE'];
	$sup_id = $_POST['SUPP_ID'];
	
	$sql = oci_parse($dbc,"SELECT * FROM PRODUCT WHERE PROD_ID = '$prod_id'");
	
	oci_execute($sql);
	$row = oci_fetch_array($sql);

	if(oci_num_rows($sql) > 0)  
	{
		unlink("upload/".$row['PROD_PIC']);
	}
	
	$query = ("UPDATE PRODUCT SET PROD_ID = '$prod_id', PROD_NAME = '$prod_name', PROD_PRICE = '$prod_price', SUPP_ID = '$sup_id', PROD_PIC = '$TargetPath' WHERE PROD_ID = '$prod_id'");  
	
	$result = oci_parse($dbc, $query);
	$objExecute = oci_execute($result, OCI_DEFAULT);

	if($objExecute)  
	{  
		oci_commit($dbc); 
		print '<script>alert("The Product is updated!");</script>';
		print '<script>window.location.assign("fadminHome.php");</script>';
	}  
	else  
	{  
		oci_rollback($dbc);
		print '<script>window.location.assign("fadminAddProduct.php");</script>'; 
	}                 
  }
}

oci_close($dbc);
?>