<?php
    $dbc=oci_connect('gameStore','1234','localhost/xe');
	
	if(!$dbc)
	{
        echo 'connection failed!';
    }
?>