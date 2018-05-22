<?php
	if($_SERVER['REQUEST_METHOD']=="GET"){
		die("404");
	} 
	require("include/config.php");
	require("include/couchdb.php");
	


	foreach($_POST["names"] as $name){
		$tokens = getTokens($name);
		$username = $_SESSION["username"];
		if ($tokens != null && $username != null){
			foreach($tokens as $token){
				var_dump(send_fcm_notification_url_fetch ($username, $token, $_POST["message"]));
			}
		}
		
	}
	
	redirect("index.php");
?>