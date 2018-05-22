<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style=" height: 100%;"xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<!-- Latest compiled and minified CSS -->
	<!-- jQuery library -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="manifest" href="js/manifest.json">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/pouchdb@6.4.3/dist/pouchdb.min.js"></script>
	<script src="js/pouchdb.find.js"></script>
	<script src="js/pouchdb_connection.js"></script>
	<link rel="stylesheet" href="css/default.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.0.3/firebase.js"></script>
	

	<script>
	  // Initialize Firebase
	  var config = {
		apiKey: "AIzaSyBYWOiKEkygdakVzChlOFHFdNIPwueWYEs",
		authDomain: "adhm-fe181.firebaseapp.com",
		databaseURL: "https://adhm-fe181.firebaseio.com",
		projectId: "adhm-fe181",
		storageBucket: "adhm-fe181.appspot.com",
		messagingSenderId: "206031946906"
	  };
	  firebase.initializeApp(config);
	  const messaging = firebase.messaging();
	  var token = "";
	  messaging.usePublicVapidKey("BFYDmi2QIkovZ4xeaqvU0ceGXwzl0Updj8Bq-khNWVJwAI_XA7QKd7VdRsTU6Z2Xn234uV9sKSSJFuucyikegJc");
	  messaging.requestPermission().then(function() {
		navigator.serviceWorker.register('sw.js').then((registration) => {
			messaging.useServiceWorker(registration);
		  });
		messaging.getToken().then(function(currentToken) {
				if (currentToken) {
				  console.log("Token:" + currentToken);
				  token = currentToken;
				}
			  }).catch(function(err) {
				console.log('An error occurred while retrieving token. ', err);
				showToken('Error retrieving Instance ID token. ', err);
				setTokenSentToServer(false);
			  });
	  }).catch(function(err) {
		console.log('Unable to get permission to notify.', err);
	  });
	  

	  

	  
	  

	</script>
</head>
<body style="  height: 100%;">
	<div class="container-fluid" style="margin-bottom: 0px; min-height:95%;  border:1px solid #cecece; width:90%; background-color: white;">
	<div class="row">
	<div class = "col-lg-12">

