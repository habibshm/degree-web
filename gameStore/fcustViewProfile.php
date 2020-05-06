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

input[type=text], [type="file"], [type="date"], [type="password"], [type="email"],  select {
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
<font color="black" face="verdana">
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

<?php  
		$dbc=oci_connect('gameStore','1234','localhost/xe');
		session_start();
		
		$cust_ic = $_SESSION['CUST_IC'];
		$query = oci_parse($dbc,"SELECT * FROM CUSTOMER WHERE CUST_IC='$cust_ic'");
			
		oci_execute($query);
			
		$row = oci_fetch_array($query);

		if(oci_num_rows($query) > 0)  
			{
?> 

<center>

<div style="margin-top: 100px;"><h1><font color="black">Your Profile.</font><h1></div>
<div style="margin-top: 50px; border-radius: 5px; background-color: #EAEAEA; padding: 20px; width: 40%;">
  <form name="fcustViewProfile" method="post" action="custUpdateProfile.php">
	
	<label for="CUST_IC">User IC</label>
	<input type="text" id="CUST_IC" name="CUST_IC" placeholder="Your ic number..." value="<?php print $row["CUST_IC"];?>"readonly>
	
	<label for="CUST_NAME">User Name</label>
	<input type="text" id="CUST_NAME" name="CUST_NAME" placeholder="Your name..." value="<?php print $row["CUST_NAME"];?>"required>
	
	<label for="CUST_EMAIL">User Email</label>
	<input type="email" id="CUST_EMAIL" name="CUST_EMAIL" placeholder="Your email..." value="<?php print $row["CUST_EMAIL"];?>"required>
	
	<label for="CUST_PASSWORD">User Password</label>
	<input type="text" id="CUST_PASSWORD" name="CUST_PASSWORD" placeholder="Your password..." value="<?php print $row["CUST_PASSWORD"];?>"required>
	
	<label for="CUST_PHONE">User Phone Number</label>
	<input type="text" id="CUST_PHONE" name="CUST_PHONE" placeholder="Your phone number start with 6 for malaysia..." value="<?php print $row["CUST_PHONE"];?>"required>
	
	<label for="CUST_ADDRESS">User Address</label>
	<input type="text" id="CUST_ADDRESS" name="CUST_ADDRESS" placeholder="Your address..." value="<?php print $row["CUST_ADDRESS"];?>"required>
	

    <input name="submit" type="submit" class="btn" value="UPDATE">
  </form>
</div>


<br><br><br><br><br><br>
<div class="footer">
	<font color="white">
		<p>&#9400;Uniq Game Store </p>
	</font>
</div>
</center>

	<?php
		}
		oci_close($dbc);
	?>	

</font>
</body>
</html>
