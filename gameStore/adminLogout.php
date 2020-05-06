<?php

// remove all session variables
session_start();

if(session_destroy())
{
	print '<script>alert("You have logged out!");</script>';
	print '<script>window.location.assign("index.php");</script>';
}
oci_close();
?>