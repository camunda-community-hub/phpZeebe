<?php
namespace Camundity\PhpZeebe;

abstract class ZeebeWorker {
    
    protected $zeebeClient;
    
    protected $type='';
    
    protected $timeout = 300000;

    protected $maxJobsToActivate = 32;
    
    protected $requestTimeout = 10000;
    
    protected $running = false;
    
    public function __construct($zeebeClient) {
        $this->zeebeClient = $zeebeClient;
    }
    
    public function work() {
        $request = $this->buildJobRequest();
        $call = $this->zeebeClient->gatewayClient()->ActivateJobs($request);
        foreach  ($call->responses() as $activateJobsResponse) {
            $jobs = $activateJobsResponse->getJobs();
            foreach ($jobs as $activatedJob) {
                $this->executeTask($activatedJob);
            }
        }
    }
	
    public function workLoop() {
		$this->running = true;
        while($this->running) {
            $this->work();
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
    public function setClient($zeebeClient) {
        $this->zeebeClient = $zeebeClient;
		return $this;
    }
    public function getVariables($activatedJob) {
        return json_decode($activatedJob->getVariables(), TRUE);
    }
    public function complete($activatedJob, $variables) {
        $this->zeebeClient->completeJob($activatedJob->getKey(), $variables);
    }
    public function stopWorkLoop() {
        $this->running = false;
    }
}