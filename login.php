<?php
	require("include/config.php");
	require("include/couchdb.php");
	
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("login_template.php", array("title"=>"login"));
	} else if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!isset($_POST["username"]) || !isset($_POST["password"]) || !isset($_POST["id"]) || !isset($_POST["token"]))
		{
			return;
		}
		
		else
		{
			$username = $_POST["username"];
			$_SESSION["username"] = $username;
			$_SESSION["id"] = $_POST["id"];
			$_SESSION["token"] = $_POST["token"];
			updateUserToken($_SESSION["id"], $_SESSION["token"]);
			redirect("index.php");
		}
	}
?>