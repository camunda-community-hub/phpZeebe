<?php
namespace Community\PhpZeebe;

class SelfManagedAuthentication {

	private $clientId = '';
	private $clientSecret = '';
	private $zeebeAuthUrl = '';
	private $token = null;
	
	public function __construct($clientId, $clientSecret, $zeebeAuthUrl) {
        $this->$clientId = $clientId;
        $this->$clientSecret = $clientSecret;
		$this->$zeebeAuthUrl = $zeebeAuthUrl;
    }
	
	public function authenticate() {
		$response = HttpClient::postFormData($zeebeAuthUrl, ['grant_type' => 'client_credentials', 'client_id' => $clientId, 'client_secret' => $clientSecret]);
		$client.setToken($response['access_token']);
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