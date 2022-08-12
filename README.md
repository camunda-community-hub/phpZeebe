# Zeebe PHP client

Client for the Camunda 8 engine, Zeebe (https://zeebe.io) - A Workflow Engine for Microservices Orchestration.

This client is based on [PHP files generated](https://github.com/camunda-community-hub/phpZeebe/tree/master/src/Command) from [Zeebe gateway protobuf definition](https://raw.githubusercontent.com/camunda/zeebe/8.0.4/gateway-protocol/src/main/proto/gateway.proto).

## building the client for another target version.
You can modify the Zeebe target version by changing the version number inside the [Makefile](https://github.com/camunda-community-hub/phpZeebe/blob/master/Makefile).

You can then run it :
```
make build-client
```

## Usage

Camunda 8 is composed of the Zeebe engine (gRPC), Tasklist (GraphQL), Operate (Rest) and Optimize (Rest). On a Self-Managed cluster, you would also have some other components (Identity, Keycloak and Elastic). The goal of this client is exclusively to communicate with Zeebe through gRPC. It's still an alpha version an major features are still missing (Contributions welcome).

Most common use case would be to instantiate processus, send a message and work on service task. I've built a [Laravel project to demo](https://github.com/chDame/phpzeebe-laravel-example) how it could be implemented but you could also imagine a microservices approach.

### building a worker

```php
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
```

### Creating a client and using it
```php
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
$worker->workLoop(); //blocking thread
```

## Laravel example
A quick example of use in Laravel : https://github.com/chDame/phpzeebe-laravel-example
Workers are executed as jobs.
