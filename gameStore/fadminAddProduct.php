<!DOCTYPE html

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>UNIQ STORE.</title>
<style>
body {font-family: 'Oswald', Helvetica, sans-serif;
background-color: #000000;}
* {box-sizing: border-box;}

.input-container {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    width: 100%;
    margin-bottom: 15px;
}

.icon {
    padding: 10px;
    background: #50C878;
    color: white;
    min-width: 50px;
    text-align: center;
	
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
    background-color: #50C878;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.btn:hover {
    opacity: 1;
}
</style>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='fadminHome.php'>Home</a></li>
   <li class='active'><a href='fadminViewProduct.php'>Product</a></li>
   <li><a href='fadminViewSupplier.php'>Supplier</a></li>
   <li ><a href='fadminViewProfile.php'>View Profile</a></li>
</ul>
</div>

<form name="fadminAddProduct" action="adminAddProduct.php" method="post" style="max-width:500px;margin:auto" enctype="multipart/form-data">

 <center>  <h3><font color="#FFD700">Add Product</font></h3 </center>
<font color="white"> 

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Product Name" name="PROD_NAME">
  </div>
  
  <div class="input-container">
    <input class="input-field" type="text" placeholder="Product Price" name="PROD_PRICE">
  </div>


    <select id="SUPP_ID" name="SUPP_ID" class="input-field" >
	<?php
		$dbc=oci_connect('gameStore','1234','localhost/xe');
		$query = "SELECT * FROM SUPPLIER";  
		$objParse = oci_parse($dbc, $query);  
		oci_execute ($objParse,OCI_DEFAULT);
		
		while($row=oci_fetch_array($objParse,OCI_BOTH))
			{
				print '<option value='.$row['SUPP_ID'].'>'.$row['SUPP_NAME'].'</option>';
			}
				print '</select>';
		print	'If there is no supplier in the list, <a style="color: green;" href="fadminAddSupplier.php">click here</a> to add the new one.<br><br>';
		
	?>

  
		INSERT IMAGE
		<input class="input-field" type="file" placeholder="Product Pic" id="PROD_PIC" name="PROD_PIC" id="PROD_PIC">

  
  <input name="submit" class="btn" type="Submit" value="ADD">
  </font>
</form>

</body>
</html>
