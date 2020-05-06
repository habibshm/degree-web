<?php

// Include connection
$dbc=oci_connect('gameStore','1234','localhost/xe');

		$email = $_POST['ADMIN_EMAIL'];
		$password = $_POST['ADMIN_PASSWORD'];

		$query = oci_parse($dbc,"SELECT * FROM ADMIN WHERE ADMIN_EMAIL='$email' AND ADMIN_PASSWORD='$password'");

		oci_execute($query);

		$row = oci_fetch_array($query);

		if(oci_num_rows($query) > 0)
		{
			session_start();
			$_SESSION['email'] = $email;
			echo("<SCRIPT LANGUAGE='JavaScript'>
			window.location.href='fadminHome.php';
			</SCRIPT>");
		}

		else
		{
			echo"<script>alert('invalid username or password');</script>";
			echo("<SCRIPT LANGUAGE='JavaScript'>
			window.location.href='fadminLogin.php';
			</SCRIPT>");
		}

	

?>