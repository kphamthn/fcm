<?php
	$autoloader = 
	require "vendor/autoload.php";
	
	//We import the classes that we need
	use PHPOnCouch\CouchClient;
	use PHPOnCouch\Exceptions;

	$client = new CouchClient('https://admin:IgumCat5@adh.rapidnet.de:6984','fcm-test');

	function getTokens($userid){
		$client = new CouchClient('https://admin:IgumCat5@adh.rapidnet.de:6984','fcm-test');
		$doc = $client->getDoc($userid);
		if ($doc->type != "user"){
			return null;
		}
		return $doc->tokens;
	}
	
	function getUserID($username){
		$client = new CouchClient('https://admin:IgumCat5@adh.rapidnet.de:6984','fcm-test');
		$opts = array ( "include_docs" => true, "key" => $username);
		$response = $client->setQueryParameters($opts)->getView("user","by-name");
		return $response->rows[0]->id;
	}
	
	function getUsername($userid){
		$client = new CouchClient('https://admin:IgumCat5@adh.rapidnet.de:6984','fcm-test');
		$doc = $client->getDoc($userid);
		if ($doc->type != "user"){
			return null;
		}
		return $doc->username;
	}
	
	function updateUserToken($userid, $token){
		$client = new CouchClient('https://admin:IgumCat5@adh.rapidnet.de:6984','fcm-test');
		$doc = $client->getDoc($userid);
		if ($doc->type != "user"){
			return null;
		}
		$tokens = $doc->tokens;
		
		if(!in_array($token, $tokens)){
			array_push($tokens, $token);
		}
		
		$doc->tokens = $tokens;
		try {
			$client->storeDoc($doc);
		} catch (Exception $e) {
		    echo "Document storage failed : " . $e->getMessage() . "<BR>\n";
		    return null;
		}
	}
	
	function deleteUserToken($userid, $token){
		$client = new CouchClient('https://admin:IgumCat5@adh.rapidnet.de:6984','fcm-test');
		$doc = $client->getDoc($userid);
		if ($doc->type != "user"){
			return null;
		}
		$tokens = $doc->tokens;	
		$index = array_search($token, $tokens);
		if($index !== false){
		    unset($tokens[$index]);
		}
		
		$doc->tokens = $tokens;
		try {
			$client->storeDoc($doc);
		} catch (Exception $e) {
		    echo "Document storage failed : " . $e->getMessage() . "<BR>\n";
		    return null;
		}
	}
	//$opts = array ( "include_docs" => true, "key" => "user1");
	//$response = $client->setQueryParameters($opts)->getDoc("user","by-name");

?>