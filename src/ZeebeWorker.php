<?php
namespace Camundity\PhpZeebe;

abstract class ZeebeWorker extends \Thread {
	
	protected $zeebeClient;
	
	private $type='';
	
	private $timeout = 0;

    private $maxJobsToActivate = 0;
    
    private $requestTimeout = 0;
	
	public function __construct($zeebeClient) {
		$this->zeebeClient = $zeebeClient;
	}
	
	public function work() {
		$this->start();
	}
	public function run() {
		$request = $this->buildJobRequest();
		$call = $this->zeebeClient->gatewayClient()->ActivateJobs($request);
		while ($activateJobsResponse = $call->responses()) {
			$jobs = $activateJobsResponse->getJobs();
			foreach ($jobs as $activatedJob) {
			  echo $activatedJob->variables;
			  $this->executeTask($activatedJob);
			}
		}
    }
	
	abstract public function executeTask($activatedJob);
	
	public function buildJobRequest() {
		return new \Camundity\PhpZeebe\Command\ActivateJobsRequest([
			'type' => $this->type,
			'worker' => get_class($this),
			'timeout' => $this->timeout,
			'maxJobsToActivate' => $this->maxJobsToActivate,
			'requestTimeout' => $this->requestTimeout
		]);
	}
	
	public function setType($type) {
		$this->type = $type;
		return $this;
	}
	public function setTimeout($timeout) {
		$this->timeout = $timeout;
		return $this;
	}
	public function setMaxJobsToActivate($maxJobsToActivate) {
		$this->maxJobsToActivate = $maxJobsToActivate;
		return $this;
	}
	public function setRequestTimeout($requestTimeout) {
		$this->requestTimeout = $requestTimeout;
		return $this;
	}
	public function getClient() {
		return $this->zeebeClient;
	}
	public function getVariables($activatedJob) {
		return json_decode($activatedJob->variables, TRUE);
	}
	public function complete($activatedJob, $variables) {
		$this->zeebeClient.completeJob($activatedJob->key, $variables);
	}
}