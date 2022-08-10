<?php
namespace Camundity\PhpZeebe;

abstract class ZeebeWorker extends \Thread {
    
    protected $zeebeClient;
    
    private $type='';
    
    private $timeout = 300000;

    private $maxJobsToActivate = 32;
    
    private $requestTimeout = 10000;
    
    private $running = false;
    
    public function __construct($zeebeClient) {
        $this->zeebeClient = $zeebeClient;
    }
    
    public function work() {
		$this->running = true;
        $this->start();
    }
    public function run() {
        $request = $this->buildJobRequest();
		while($this->running) {
			$call = $this->zeebeClient->gatewayClient()->ActivateJobs($request);
			foreach  ($call->responses() as $activateJobsResponse) {
				$jobs = $activateJobsResponse->getJobs();
				foreach ($jobs as $activatedJob) {
				  $this->executeTask($activatedJob);
				}
			}
			usleep(100000);
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
        return json_decode($activatedJob->getVariables(), TRUE);
    }
    public function complete($activatedJob, $variables) {
        $this->zeebeClient->completeJob($activatedJob->getKey(), $variables);
    }
	public function stop() {
		$this->running = false;
	}
}