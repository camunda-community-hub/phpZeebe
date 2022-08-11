<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once('SelectAssigneeWorker.php');
require_once('MailWorker.php');
use Camundity\PhpZeebe\ZeebeClient;

$client = new ZeebeClient("XXX");
$client->saasAuth("XXX", "XXX");

$client->deployProcess("camunda-process.bpmn");

$client->runInstance("camunda-process2","latest", ["var1"=>"something"]);
$client->publishMessage("messageName","correlationKey", ["var2"=>"someOtherValue"]);

$worker2 = new MailWorker($client);
$worker2->work();
$worker = new SelectAssigneeWorker($client);
$worker->workLoop(); //blocking. Sould be handled in a separate thread (like Laravel workers)
?>