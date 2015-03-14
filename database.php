<?php

ini_set('display_errors', 'On');
try {
	$db = new PDO('mysql:host=localhost;dbname=simple_app;port=8889', "root", "root");
} catch(Exception $e) {
	echo "could not connect to the database";
	die();
}?>