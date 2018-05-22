<?php
	require("include/config.php");
	if($_SERVER['REQUEST_METHOD'] == "GET"){			
		render("message_template.php", array("title"=>"Choose a module"));
	
}
	
?>