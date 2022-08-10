<?php
namespace Camundity\PhpZeebe;

class SaaSAuthentication {

	private $clientId = '';
	private $clientSecret = '';
	private $token = null;
	
	public function __construct($clientId, $clientSecret) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }
	
	public function authenticate() {
		$response = HttpClient::postJson('https://login.cloud.camunda.io/oauth/token', ['audience' => 'zeebe.camunda.io', 'client_id' => $this->clientId, 'client_secret' => $this->clientSecret, 'grant_type' => 'client_credentials']);
		$this->token = $response['access_token'];
	}
	
	public function getToken() {
		if (is_null($this->token)) {
			$this->authenticate();
		}
		return $this->token;
	}
}

?>