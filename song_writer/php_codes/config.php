<?php

	$db=new PDO('mysql:host=localhost;dbname=mydailysong_db;charset=utf8', 'jeffNucleust', 'thenucleusTboy777');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

	session_start();

?>
