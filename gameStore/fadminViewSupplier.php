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
background-color: black;}
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

.delete {
    background-color: #CC0000
;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.delete:hover {
    opacity: 1;
}

.button {
    background-color: #50C878;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.button:hover {
    opacity: 1;
}
</style>
</head>
<body>
<font color="white" face="arial">
<div id='cssmenu'>
<ul>
   <li><a href='fadminHome.php'>Home</a></li>
   <li><a href='fadminViewProduct.php'>Product</a></li>
   <li class='active'><a href=''>Supplier</a></li>
   <li ><a href='fadminViewProfile.php'>View Profile</a></li>
</ul>
</div>

<?php  
			$dbc=oci_connect('gameStore','1234','localhost/xe');
			$query = "SELECT * FROM SUPPLIER";  
			$objParse = oci_parse($dbc, $query);  
			oci_execute ($objParse,OCI_DEFAULT);  
		?>
	<div class="gtco-loader"></div>
	
	<div id="page">
			<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
			<div class="col-md-9">
			<br>
				<div style="width: 10%; margin-left: 1300px;">
					<a href="fadminAddSupplier.php">
					<button class="button"><b>ADD NEW SUPPLIER</b></button>
					</a>
				</div>
				<div style="margin-top: -80px;">
					<h2 class="cursive-font">SUPPLIER</h2>	
				</div>
				</div>
				 <div class="content-wrapper">

          <section class="content">
            <div class="row">
            
			
            <div class="col-xs-9">
              <div class="box box-primary">

                  <table style="border-spacing: 20px; color:white;">
                      <tr>
                      	<th>Supplier ID</th>
                        <th>Supplier Name</th>
					    <th>Contact</th>
                        <th>Supplier Web Address</th>
                        <th>Supplier Address</th>
                      </tr>
                      <?php
						while($objResult=oci_fetch_array($objParse,OCI_BOTH))  
					  	{
					  ?> 
                      <tr>  
						<td><?= $objResult["SUPP_ID"]; ?></td>  
						<td><?= $objResult["SUPP_NAME"]; ?></td>  
						<td><?= $objResult["SUPP_PHONE"]; ?></td>  
						<td><?= $objResult["SUPP_WEB"]; ?></td>  
						<td><?= $objResult["SUPP_ADDRESS"]; ?></td> 
						                           
						<td> 
							<a href ="fadminUpdateSupplier.php?sup_id=<?=$objResult["SUPP_ID"]; ?>">
                            <button class="btn"><b>UPDATE</b></button>
                            </a>
						</td>
						<td>
							<a href="adminDeleteSupplier.php?sup_id=<?=$objResult['SUPP_ID']; ?>">
							<button class="delete"><b>DELETE</b></button>
							</a>
						</td>
                      
                      </tr> 
					  <?php   
                      	}  
                      ?>  
                      
                    </table>
				</div>
			</div>
		</div>
                    <?php
	 					oci_close($dbc);
					?>	
</font>
</body>
</html>
