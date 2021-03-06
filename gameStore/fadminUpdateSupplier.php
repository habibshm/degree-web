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
   <li><a href='fadminViewProduct.php'>Product</a></li>
   <li class='active'><a href='fadminViewSupplier.php'>Supplier</a></li>
   <li ><a href='fadminViewProfile.php'>View Profile</a></li>
</ul>
</div>

<?php  
		$dbc=oci_connect('gameStore','1234','localhost/xe');
		session_start();
		
		$sup = $_GET["sup_id"];
		$query = oci_parse($dbc,"SELECT * FROM SUPPLIER WHERE SUPP_ID='$sup'");
		
		oci_execute($query);
			
		$row = oci_fetch_array($query);

		if(oci_num_rows($query) > 0)  
		{
?> 

<form name="fadminAddProduct" action="adminUpdateSupplier.php" method="post" style="max-width:500px;margin:auto">
 <center>  <h3><font color="#FFD700">Update Supplier</font></h3 </center>
 
  <div class="input-container">
    <input class="input-field" type="text" placeholder="Supplier ID" name="SUPP_ID" value="<?php print $row['SUPP_ID'];?>"readonly>
  </div> 

  <div class="input-container">
    <input class="input-field" type="text" placeholder="Supplier Name" name="SUPP_NAME" value="<?php print $row['SUPP_NAME'];?>"required>
  </div>

  <div class="input-container">
    <input class="input-field" type="number" placeholder="Supplier Phone" name="SUPP_PHONE" value="<?php print $row['SUPP_PHONE'];?>"required>
  </div>
  
  <div class="input-container">
    <input class="input-field" type="text" placeholder="Supplier Web Address" name="SUPP_WEB" value="<?php print $row['SUPP_WEB'];?>"required>
  </div>
  
  <div class="input-container">
    <input class="input-field" type="text" placeholder="Supplier Address" name="SUPP_ADDRESS" value="<?php print $row['SUPP_ADDRESS'];?>"required>
  </div>
  
  <input name="submit" class="btn" type="Submit" value="UPDATE">
</form>

	<?php
		}
		oci_close($dbc);
	?>

</body>
</html>
