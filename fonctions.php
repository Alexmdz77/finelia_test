<?php
	function connection(){

		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "finelia";

		try
		{
			$bdd = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
		}
		catch(PDOException $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		return $bdd;
	}
?>