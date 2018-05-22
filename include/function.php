<?php
	require("constant.php");	
	
	function logout()
	{
		 $_SESSION = array();
        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }
        // destroy session
        session_destroy();
	}
	
	function render($template, $value = array())
	{
		if(file_exists("templates/$template"))
		{
			extract($value);
			
            // render header
            require("templates/header.php");
		
	        // render taskbar
            require("templates/taskbar.php");

			// render template
            require("templates/$template");
			
			require("templates/footer.php");


            // render footer
		}
		
		else trigger_error("Template does not existed", E_USER_ERROR);
	}
	
	function renderSideMenu($template, $value = array()){
		if(file_exists("templates/$template"))
		{
			extract($value);
			
            require("templates/$template");
		}
		
		else trigger_error("Template does not existed", E_USER_ERROR);
	}
	
	function redirect($page)
	{
		header("Location: $page");
		exit;
	}
	



	function send_fcm_notification_url_fetch ($username, $tokens,$message) {

			 
			  $url = 'https://fcm.googleapis.com/fcm/send';
			 
			 echo $tokens;
			 $fields = array('to' => $tokens ,
			 'data' => array('text' => $message, 'title' => $username));
			 
			 
			 define('GOOGLE_API_KEY', 'AAAAL_h2BJo:APA91bHnUyqpCGW5tdEoDDExcjzXY49gxvfE6afss5VWs9RdA4W2g8SN9w3eX6cG4b6lH_T76g-xRR9tksKt_A2R3LkQDTNCiIReuBpb4_bdhftN5Cee8oBX2FtXRhalWyj4L7Roxot8');
			 
			 $headers = array(
				   'Authorization:key='.GOOGLE_API_KEY,
				   'Content-Type: application/json'
			  );
			 
			 $ch = curl_init();
			 curl_setopt($ch, CURLOPT_URL, $url);
			 curl_setopt($ch, CURLOPT_POST, true);
			 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			 curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
			 
			 $result = curl_exec($ch);
			 if($result === false)
			 die('Curl failed ' . curl_error());
			 curl_close($ch);
			 return $result;
	}



?>

