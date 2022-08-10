<?php
namespace ZeebeClient;

class SaaSAuthentication {

	private $clientId = '';
	private $clientSecret = '';
	private $token = null;
	
	public function __construct($clientId, $clientSecret) {
        $this->$clientId = $clientId;
        $this->$clientSecret = $clientSecret;
    }
	
	public function authenticate() {
		$response = HttpClient::postJson('https://login.cloud.camunda.io/oauth/token', ['audience' => 'zeebe.camunda.io', 'client_id' => $clientId, 'client_secret' => $clientSecret, 'grant_type' => 'client_credentials']);
		this->$token = $response['access_token'];
	}
	
	public function getToken() {
		if (is_null($token)) {
			authenticate();
		}
		return $token;
	}
}

?>