<?php  


	require_once 'vendor/autoload.php';

	$google_client = new Google_Client();

	//Set the OAuth 2.0 Client ID
	$google_client->setClientId('538451085154-6npr200ujuts4lcvkjblunio2obdk674.apps.googleusercontent.com');

	//Set the OAuth 2.0 Client Secret key
	$google_client->setClientSecret('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');

	//Set the OAuth 2.0 Redirect URI
	$google_client->setRedirectUri('http://localhost/FSUU_THESIS-main/main/controller.php');


	$google_client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");


	$login_url = $google_client->createAuthUrl();

	// echo $clientid;

?>