<?php
namespace Camundity\PhpZeebe;

class ZeebeClient {

	private $clusterId = null;
	private $region = "bru-2";
	private $authentication = null;
	private $gatewayClient = null;
	
	public function __construct($clusterId) {
		$this->clusterId = $clusterId;
	}
	
	public function region($region) {
		$this->region = $region;
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
	
	public function gatewayClient() {
		if (is_null($this->gatewayClient)) {
			$token = $this->authentication->getToken();
			$this->gatewayClient = new \Camundity\PhpZeebe\Command\GatewayClient($this->clusterId.".".$this->region.".zeebe.camunda.io:443", [
				'credentials' => \Grpc\ChannelCredentials::createSsl(),
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