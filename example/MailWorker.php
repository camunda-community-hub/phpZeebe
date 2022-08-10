<?php

use Camundity\PhpZeebe\ZeebeWorker;

class MailWorker extends ZeebeWorker {
	
	public function __construct($zeebeClient) {
		parent::__construct($zeebeClient);
		$this->setType("email");
    }
	
	
	public function executeTask($activatedJob){
		$variables = $this->getVariables($activatedJob);
		var_dump($variables);
		$variables["notified"] = "envoyé";
		$this->complete($activatedJob, $variables);
	}
}
?>