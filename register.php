<?php
	require("include/config.php");
	require("include/couchdb.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){
		render("register_template.php", array("title"=>"Register"));
	} else if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!isset($_POST["usernameInput"]) || !isset($_POST["passwordInput"]))
		{
			return;
		}
		
		else
		{
			$username = $_POST["usernameInput"];
			$_SESSION["username"] = $username;
			$_SESSION["id"] = getUserID($username);
			$_SESSION["token"] = $_POST["token"];
			redirect("index.php");
		}
	}
?>