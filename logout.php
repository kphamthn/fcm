<?php
	require("include/config.php");
	require("include/couchdb.php");
	deleteUserToken($_SESSION["id"], $_SESSION["token"]);
	logout();
	redirect("index.php");
?>