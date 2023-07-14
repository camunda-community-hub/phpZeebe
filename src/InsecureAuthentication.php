<?php
namespace Camundity\PhpZeebe;

class InsecureAuthentication {

	private $clientId = '';
	private $clientSecret = '';
	private $token = null;
	
	public function __construct($clientId, $clientSecret) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }
	
	public function authenticate() {
		$this->token = "";
	}
	
	public function getToken() {
		if (is_null($this->token)) {
			$this->authenticate();
		}
		return $this->token;
	}
}

?> 
