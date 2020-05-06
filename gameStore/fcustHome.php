<html>
<head>
<style>

.footer {
    background-color: black;
    padding: 10px;
	position:fixed;
	left:0px;
	bottom:0px;
	height:30px;
	width:100%;
}

.button {
    background-color: #9400F9;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	width: 15%;
	height: 15%
}

.button:hover {background-color: #AE39FF}


body  {
    background-image: url("images/firewatch-video-game-desktop-wallpaper-59162-60946-hd-wallpapers.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
	background-size: 100%;
	margin: 0;
}

.navbar {
    overflow: hidden;
    background-color: black;
    font-family: Arial;
	position: fixed;
	top: 0;
	width: 100%;
}

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
	
}

.dropdown .dropbtn {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: #9400F9;
}

.dropdown-content {
    display: none;
    background-color: #f9f9f9;
	position: fixed;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
    border-right:1px solid #bbb;
}

li:last-child {
    border-right: none;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}


.active {
    background-color: #4CAF50;
}

input[type=text], [type="file"], [type="date"], [type="password"],  select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.btn {
    background-color: #50C878;
    color: white;
    padding: 15px 20px;
    border: none;
    cursor: pointer;
    width: 60%;
    opacity: 0.9;
	font-weight: bold;
}

.btn:hover {
    opacity: 1;
}


</style>
<title>UNIQ STORE.</title>
</head>
<body>
<font color="white" face="verdana">
<ul>
<div class="navbar">
	<li><a href="fcustHome.php">HOME</a></li>
	<div class="dropdown">
			<li><button class="dropbtn"><?php session_start(); Print ''. $_SESSION['CUST_NAME']; ?></button>
			<div class="dropdown-content">
				<a href="fcustViewCart.php">VIEW YOUR CART</a>
				<a href="fcustViewProfile.php">VIEW YOUR PROFILE</a>
				
			</li>		
			</div>
			<div style="float: right;"><a href="custLogout.php">LOG OUT</a></div>
			
			
	</div>
</div>
</ul>


<center>
<br><br><br><br><br>

<font style="color: black;"><h1>UNIQ STORE.</h1></font><div><marquee style="width: 30%; margin-right: 10px;"><font style="color: #CC0000;"><h1>We provide the best deals in the market. </h1></font></marquee></div>

<?php


$dbc=oci_connect('gameStore','1234','localhost/xe');

$query = "SELECT * FROM PRODUCT";
$objParse = oci_parse($dbc, $query);  
oci_execute ($objParse,OCI_DEFAULT); 
	
    while($row=oci_fetch_array($objParse,OCI_BOTH))
	{
		print '<b><div style="float: left; width: 20%; height: 50%;"><img width = 200px; height=200px; src="upload/'.$row["PROD_PIC"].'">';
        print '<br>'. $row["PROD_NAME"]. '<br>RM ' . $row["PROD_PRICE"];
		print '<br><a href="custAddToCart.php?prodid='.$row['PROD_ID'].'"><input type="button" class="btn" value="ADD TO CART"></a></div></b>';
    }

oci_close($dbc);
?>



<br><br><br><br><br><br>
<div class="footer">
	<font color="white">
		<p>&#9400;Uniq Game Store </p>
	</font>
</div>
</center>
</font>
</body>
</html>
