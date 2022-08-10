<?php
// GENERATED CODE -- DO NOT EDIT!

namespace ZeebeClient\Command;

/**
 */
class GatewayClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     *
     * Iterates through all known partitions round-robin and activates up to the requested
     * maximum and streams them back to the client as they are activated.
     *
     * Errors:
     * INVALID_ARGUMENT:
     * - type is blank (empty string, null)
     * - worker is blank (empty string, null)
     * - timeout less than 1
     * - maxJobsToActivate is less than 1
     * @param \ZeebeClient\Command\ActivateJobsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function ActivateJobs(\ZeebeClient\Command\ActivateJobsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/gateway_protocol.Gateway/ActivateJobs',
        $argument,
        ['\ZeebeClient\Command\ActivateJobsResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Cancels a running process instance
     *
     * Errors:
     * NOT_FOUND:
     * - no process instance exists with the given key
     * @param \ZeebeClient\Command\CancelProcessInstanceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CancelProcessInstance(\ZeebeClient\Command\CancelProcessInstanceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CancelProcessInstance',
        $argument,
        ['\ZeebeClient\Command\CancelProcessInstanceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Completes a job with the given variables, which allows completing the associated service task.
     *
     * Errors:
     * NOT_FOUND:
     * - no job exists with the given job key. Note that since jobs are removed once completed,
     * it could be that this job did exist at some point.
     *
     * FAILED_PRECONDITION:
     * - the job was marked as failed. In that case, the related incident must be resolved before
     * the job can be activated again and completed.
     * @param \ZeebeClient\Command\CompleteJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CompleteJob(\ZeebeClient\Command\CompleteJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CompleteJob',
        $argument,
        ['\ZeebeClient\Command\CompleteJobResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Creates and starts an instance of the specified process. The process definition to use to
     * create the instance can be specified either using its unique key (as returned by
     * DeployProcess), or using the BPMN process ID and a version. Pass -1 as the version to use the
     * latest deployed version. Note that only processes with none start events can be started through
     * this command.
     *
     * Errors:
     * NOT_FOUND:
     * - no process with the given key exists (if processDefinitionKey was given)
     * - no process with the given process ID exists (if bpmnProcessId was given but version was -1)
     * - no process with the given process ID and version exists (if both bpmnProcessId and version were given)
     *
     * FAILED_PRECONDITION:
     * - the process definition does not contain a none start event; only processes with none
     * start event can be started manually.
     *
     * INVALID_ARGUMENT:
     * - the given variables argument is not a valid JSON document; it is expected to be a valid
     * JSON document where the root node is an object.
     * @param \ZeebeClient\Command\CreateProcessInstanceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateProcessInstance(\ZeebeClient\Command\CreateProcessInstanceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CreateProcessInstance',
        $argument,
        ['\ZeebeClient\Command\CreateProcessInstanceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Behaves similarly to `rpc CreateProcessInstance`, except that a successful response is received when the process completes successfully.
     * @param \ZeebeClient\Command\CreateProcessInstanceWithResultRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function CreateProcessInstanceWithResult(\ZeebeClient\Command\CreateProcessInstanceWithResultRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/CreateProcessInstanceWithResult',
        $argument,
        ['\ZeebeClient\Command\CreateProcessInstanceWithResultResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Deploys one or more processes to Zeebe. Note that this is an atomic call,
     * i.e. either all processes are deployed, or none of them are.
     *
     * Errors:
     * INVALID_ARGUMENT:
     * - no resources given.
     * - if at least one resource is invalid. A resource is considered invalid if:
     * - the resource data is not deserializable (e.g. detected as BPMN, but it's broken XML)
     * - the process is invalid (e.g. an event-based gateway has an outgoing sequence flow to a task)
     * @param \ZeebeClient\Command\DeployProcessRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeployProcess(\ZeebeClient\Command\DeployProcessRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/DeployProcess',
        $argument,
        ['\ZeebeClient\Command\DeployProcessResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Deploys one or more resources (e.g. processes or decision models) to Zeebe.
     * Note that this is an atomic call, i.e. either all resources are deployed, or none of them are.
     *
     * Errors:
     * INVALID_ARGUMENT:
     * - no resources given.
     * - if at least one resource is invalid. A resource is considered invalid if:
     * - the content is not deserializable (e.g. detected as BPMN, but it's broken XML)
     * - the content is invalid (e.g. an event-based gateway has an outgoing sequence flow to a task)
     * @param \ZeebeClient\Command\DeployResourceRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DeployResource(\ZeebeClient\Command\DeployResourceRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/DeployResource',
        $argument,
        ['\ZeebeClient\Command\DeployResourceResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Marks the job as failed; if the retries argument is positive, then the job will be immediately
     * activatable again, and a worker could try again to process it. If it is zero or negative however,
     * an incident will be raised, tagged with the given errorMessage, and the job will not be
     * activatable until the incident is resolved.
     *
     * Errors:
     * NOT_FOUND:
     * - no job was found with the given key
     *
     * FAILED_PRECONDITION:
     * - the job was not activated
     * - the job is already in a failed state, i.e. ran out of retries
     * @param \ZeebeClient\Command\FailJobRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function FailJob(\ZeebeClient\Command\FailJobRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/FailJob',
        $argument,
        ['\ZeebeClient\Command\FailJobResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Reports a business error (i.e. non-technical) that occurs while processing a job. The error is handled in the process by an error catch event. If there is no error catch event with the specified errorCode then an incident will be raised instead.
     *
     * Errors:
     * NOT_FOUND:
     * - no job was found with the given key
     *
     * FAILED_PRECONDITION:
     * - the job is not in an activated state
     * @param \ZeebeClient\Command\ThrowErrorRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ThrowError(\ZeebeClient\Command\ThrowErrorRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/ThrowError',
        $argument,
        ['\ZeebeClient\Command\ThrowErrorResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Publishes a single message. Messages are published to specific partitions computed from their
     * correlation keys.
     *
     * Errors:
     * ALREADY_EXISTS:
     * - a message with the same ID was previously published (and is still alive)
     * @param \ZeebeClient\Command\PublishMessageRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function PublishMessage(\ZeebeClient\Command\PublishMessageRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/PublishMessage',
        $argument,
        ['\ZeebeClient\Command\PublishMessageResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Resolves a given incident. This simply marks the incident as resolved; most likely a call to
     * UpdateJobRetries or SetVariables will be necessary to actually resolve the
     * problem, following by this call.
     *
     * Errors:
     * NOT_FOUND:
     * - no incident with the given key exists
     * @param \ZeebeClient\Command\ResolveIncidentRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function ResolveIncident(\ZeebeClient\Command\ResolveIncidentRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/ResolveIncident',
        $argument,
        ['\ZeebeClient\Command\ResolveIncidentResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Updates all the variables of a particular scope (e.g. process instance, flow element instance)
     * from the given JSON document.
     *
     * Errors:
     * NOT_FOUND:
     * - no element with the given elementInstanceKey exists
     * INVALID_ARGUMENT:
     * - the given variables document is not a valid JSON document; valid documents are expected to
     * be JSON documents where the root node is an object.
     * @param \ZeebeClient\Command\SetVariablesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function SetVariables(\ZeebeClient\Command\SetVariablesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/SetVariables',
        $argument,
        ['\ZeebeClient\Command\SetVariablesResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Obtains the current topology of the cluster the gateway is part of.
     * @param \ZeebeClient\Command\TopologyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function Topology(\ZeebeClient\Command\TopologyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/Topology',
        $argument,
        ['\ZeebeClient\Command\TopologyResponse', 'decode'],
        $metadata, $options);
    }

    /**
     *
     * Updates the number of retries a job has left. This is mostly useful for jobs that have run out of
     * retries, should the underlying problem be solved.
     *
     * Errors:
     * NOT_FOUND:
     * - no job exists with the given key
     *
     * INVALID_ARGUMENT:
     * - retries is not greater than 0
     * @param \ZeebeClient\Command\UpdateJobRetriesRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function UpdateJobRetries(\ZeebeClient\Command\UpdateJobRetriesRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gateway_protocol.Gateway/UpdateJobRetries',
        $argument,
        ['\ZeebeClient\Command\UpdateJobRetriesResponse', 'decode'],
        $metadata, $options);
    }

}
