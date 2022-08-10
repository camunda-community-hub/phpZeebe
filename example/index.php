<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once('SelectAssigneeWorker.php');
require_once('MailWorker.php');
use Camundity\PhpZeebe\ZeebeClient;

if (extension_loaded("pthreads")) {
	    echo "Using pthreads\n";
} else  echo "Using polyfill\n";

$client = new ZeebeClient("XXX");
$client->saasAuth("XXX", "XXX");

$client->deployProcess("camunda-process.bpmn");

$client->runInstance("camunda-process2","latest", ["text"=>"flute"]);

$worker2 = new MailWorker($client);
$worker2->work();
$worker = new SelectAssigneeWorker($client);
$worker->work();
?>