<?php

use Camundity\PhpZeebe\ZeebeWorker;

class SelectAssigneeWorker extends ZeebeWorker {
	
	public function __construct($zeebeClient) {
		parent::__construct($zeebeClient);
		$this->setType("selectAssignee");
    }
	
	
	public function executeTask($activatedJob){
		$variables = $this->getVariables($activatedJob);
		var_dump($variables);
		$variables["assignee1"] = "toto";
		$this->complete($activatedJob, $variables);
	}
}
?>