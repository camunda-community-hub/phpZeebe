<?php
namespace Camundity\PhpZeebe;

class ZeebeClient {

	private $clusterId = null;
	private $region = "bru-2";
	private $zeebeUrl= ".zeebe.camunda.io:443"; 
	private $authentication = null;
	private $gatewayClient = null;
	
	public function __construct($clusterId) {
		$this->clusterId = $clusterId;
	}
	
	public function region($region) {
		$this->region = $region;
		return $this;
	}

	public function zeebeUrl($zeebeUrl) {
		$this->zeebeUrl = $zeebeUrl;
		return $this;
	}	
	
	public function saasAuth(string $clientId, string $clientSecret) {
		$this->authentication = new SaaSAuthentication($clientId, $clientSecret);
        return $this;
	}
	
	public function smAuth($zeebeAuthUrl, $clientId, $clientSecret) {
		$this->authentication = new SelfManagedAuthentication($clientId, $clientSecret, $zeebeAuthUrl);
        return $this;
	}

	public function insecureAuth(){
		$this->authentication = new InsecureAuthentication();
        return $this;
	}	
	
	public function gatewayClient() {
		if (is_null($this->gatewayClient)) {
			$token = $this->authentication->getToken();
			echo "authentication: ".get_class($this->authentication)."\n"; 
			$credentials= get_class($this->authentication) === "InsecureAuthentication" ? \Grpc\ChannelCredentials::createInsecure() : \Grpc\ChannelCredentials::createSsl(); 
			if(!empty($this->region) && !is_null($this->region) && !strlen($this->region)===0)
			$zeebeConnection=$this->region.$this->zeebeUrl; 
			else
			$zeebeConnection=$this->zeebeUrl; 
			
			if(!empty($this->clusterId)&& !is_null($this->clusterId) && !strlen($this->clusterId)===0)
			$zeebeConnection=$ths->clusterId.".".$this->zeebeUrl; 
			
			$this->gatewayClient = new \Camundity\PhpZeebe\Command\GatewayClient($zeebeConnection, [
				'credentials' =>$credentials,
				'update_metadata' => function ($metaData) use ($token) {
					$metaData['authorization'] = ['Bearer ' . $token];
					return $metaData;
				}
			]);
		}
		return $this->gatewayClient;
	}
	
	public function deployProcess($path) {
		$process = new \Camundity\PhpZeebe\Command\ProcessRequestObject([
			'name' => basename($path),
			'definition' => file_get_contents($path)
		]);

		$deployRequest = new \Camundity\PhpZeebe\Command\DeployProcessRequest([
			'processes' => [$process]
		]);
		$gatewayClient = $this->gatewayClient();
		[$rsp, $status] = $gatewayClient ->DeployProcess($deployRequest)->wait();
		
		return $rsp;
	}
	
	
	public function runInstanceFromKey($processDefinitionKey, $variables) {
		$gatewayClient = $this->gatewayClient();

		$request = new \Camundity\PhpZeebe\Command\CreateProcessInstanceRequest([
			'processDefinitionKey' => $processDefinitionKey,
			'variables' => json_encode($variables)
		]);

		[$rsp, $status] = $gatewayClient->CreateProcessInstance($request)->wait();

		return $rsp;
	}
	
	public function runInstance($bpmnProcessId, $version, $variables) {
		$gatewayClient = $this->gatewayClient();
		if($version=='latest') {
			$version=-1;
		}
		$request = new \Camundity\PhpZeebe\Command\CreateProcessInstanceRequest([
			'version' => $version,
			'bpmnProcessId' => $bpmnProcessId,
			'variables' => json_encode($variables)
		]);

		[$rsp, $status] = $gatewayClient->CreateProcessInstance($request)->wait();

		return $rsp;
	}
	
	public function completeJob($jobKey, $variables) {
		
		$request = new \Camundity\PhpZeebe\Command\CompleteJobRequest([
			'jobKey' => $jobKey,
			'variables' => json_encode($variables)
		]);
		
		[$rsp, $status] = $this->gatewayClient->CompleteJob($request)->wait();

		return $rsp;
	}

	public function failJob($jobKey, $retries, $errorMessage) {
		
		$request = new \Camundity\PhpZeebe\Command\FailJobRequest([
			'jobKey' => $jobKey,
			'retries' => $retries, 
			'errorMessage' => $errorMessage
		]);
		
		[$rsp, $status] = $this->gatewayClient->failJob($request)->wait();

		return 	[$rsp, $status];
	}
	
	public function throwError($jobKey, $errorCode, $errorMessage) {
		
		$request = new \Camundity\PhpZeebe\Command\ThrowErrorRequest([
			'jobKey' => $jobKey,
			'errorCode' => $errorCode, 
			'errorMessage' => $errorMessage
		]);
		
		[$rsp, $status] = $this->gatewayClient->ThrowError($request)->wait();

		return 	[$rsp, $status];
	}
	
	
	public function publishMessage($messageName, $correlationKey, $variables) {
		$request = new \Camundity\PhpZeebe\Command\PublishMessageRequest([
			'name' => $messageName,
			'correlationKey' => $correlationKey,
			'variables' => json_encode($variables),
			'timeToLive' => 3600000 //1 hour
		]);
		
		[$rsp, $status] = $this->gatewayClient->PublishMessage($request)->wait();

		return $rsp;
	}
}
?>
