<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');
	
		session_start();
		
		$cust_email = $_POST['CUST_EMAIL'];
		$cust_password = $_POST['CUST_PASSWORD'];
		

		$query = oci_parse($dbc,"SELECT * FROM CUSTOMER WHERE CUST_EMAIL='$cust_email' AND CUST_PASSWORD='$cust_password'");
		
		oci_execute($query);
		

		$row = oci_fetch_array($query);

		if(oci_num_rows($query) > 0)
		{
			$_SESSION['CUST_NAME'] = $row['CUST_NAME'];
			$_SESSION['CUST_IC'] = $row['CUST_IC'];
			echo("<SCRIPT LANGUAGE='JavaScript'>
			window.location.href='fcustHome.php';
			</SCRIPT>");
		}

		else
		{
			echo"<script>alert('invalid username or password');</script>";
			echo("<SCRIPT LANGUAGE='JavaScript'>
			window.location.href='fcustLogin.php';
			</SCRIPT>");
		}

	

?>