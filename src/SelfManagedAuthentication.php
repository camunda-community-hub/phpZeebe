<?php
namespace Camundity\PhpZeebe;

class SelfManagedAuthentication {

	private $clientId = '';
	private $clientSecret = '';
	private $zeebeAuthUrl = '';
	private $token = null;
	
	public function __construct($clientId, $clientSecret, $zeebeAuthUrl) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
		$this->zeebeAuthUrl = $zeebeAuthUrl;
    }
	
	public function authenticate() {
		$response = HttpClient::postFormData($this->zeebeAuthUrl, ['grant_type' => 'client_credentials', 'client_id' => $this->clientId, 'client_secret' => $this->clientSecret]);
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