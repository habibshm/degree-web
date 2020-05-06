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
<font color="white" face="arial">
<div id='cssmenu'>
<ul>
   <li><a href='fadminHome.php'>Home</a></li>
   <li ><a href='fadminViewProduct.php'>Product</a></li>
   <li><a href='fadminViewSupplier.php'>Supplier</a></li>
   <li class='active'><a href=''>View Profile</a></li>
</ul>
</div>

<?php  
		$dbc=oci_connect('gameStore','1234','localhost/xe');
		session_start();
		$e = $_SESSION['email'];
		$query = oci_parse($dbc,"SELECT * FROM ADMIN WHERE ADMIN_EMAIL='$e'");
			
		oci_execute($query);
			
		$row = oci_fetch_array($query);

?>
        
		<?php
			if(oci_num_rows($query) > 0)  
			{
		?> 
			<div width="50%">
			<form action="adminUpdateProfile.php" method="post" style="max-width:500px;margin:auto">
				<center>  <h3><font color="#FFD700"></font></h3 </center>
				 
				 <div style="margin-left: 20px; width: 50%;"><?php print '<b><img width = 60%; src="data:image/jpeg;base64,'.base64_encode( $row["ADMIN_PIC"]->load() ).'"></b>';?></div>
				 <br>
				<div class="input-container">
					<i class="fa fa-user icon"></i>
					<input class="input-field" type="text" placeholder="Admin ID" name="ADMIN_IC" value="<?php print $row["ADMIN_IC"];?>"required>
				</div>
				 
				<div class="input-container">
					<i class="fa fa-user icon"></i>
					<input class="input-field" type="text" placeholder="Admin Name" name="ADMIN_NAME" value="<?php print $row["ADMIN_NAME"];?>"required>
				</div>

				<div class="input-container">
					<i class="fa fa-envelope icon"></i>
					<input class="input-field" type="email" placeholder="Admin Email" name="ADMIN_EMAIL" value="<?php print $row["ADMIN_EMAIL"];?>"required>
				</div>
				  
				<div class="input-container">
					<i class="fa fa-key icon"></i>
					<input class="input-field" type="text" placeholder="Admin Password" name="ADMIN_PASSWORD" value="<?php print $row["ADMIN_PASSWORD"];?>"required>
				</div>
				  
				<div class="input-container">
					<i class="fa fa-phone icon"></i>
					<input class="input-field" type="text" placeholder="Admin Phone number" name="ADMIN_PHONE" value="<?php print $row["ADMIN_PHONE"];?>"required>
				</div>
				  
				<div class="input-container">
					<i class="fa fa-home icon"></i>
					<input class="input-field" type="text" placeholder="Admin Address" name="ADMIN_ADDRESS" value="<?php print $row["ADMIN_ADDRESS"];?>"required>
				</div>

				  <button type="submit" class="btn">UPDATE</button>
			</form>
			</div>
		
                    <?php
						}
	 					oci_close($dbc);
					?>	
</font>
</body>
</html>
