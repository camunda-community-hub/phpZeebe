<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace Camundity\PhpZeebe\Command;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.ActivatedJob</code>
 */
class ActivatedJob extends \Google\Protobuf\Internal\Message
{
    /**
     * the key, a unique identifier for the job
     *
     * Generated from protobuf field <code>int64 key = 1;</code>
     */
    protected $key = 0;
    /**
     * the type of the job (should match what was requested)
     *
     * Generated from protobuf field <code>string type = 2;</code>
     */
    protected $type = '';
    /**
     * the job's process instance key
     *
     * Generated from protobuf field <code>int64 processInstanceKey = 3;</code>
     */
    protected $processInstanceKey = 0;
    /**
     * the bpmn process ID of the job process definition
     *
     * Generated from protobuf field <code>string bpmnProcessId = 4;</code>
     */
    protected $bpmnProcessId = '';
    /**
     * the version of the job process definition
     *
     * Generated from protobuf field <code>int32 processDefinitionVersion = 5;</code>
     */
    protected $processDefinitionVersion = 0;
    /**
     * the key of the job process definition
     *
     * Generated from protobuf field <code>int64 processDefinitionKey = 6;</code>
     */
    protected $processDefinitionKey = 0;
    /**
     * the associated task element ID
     *
     * Generated from protobuf field <code>string elementId = 7;</code>
     */
    protected $elementId = '';
    /**
     * the unique key identifying the associated task, unique within the scope of the
     * process instance
     *
     * Generated from protobuf field <code>int64 elementInstanceKey = 8;</code>
     */
    protected $elementInstanceKey = 0;
    /**
     * a set of custom headers defined during modelling; returned as a serialized
     * JSON document
     *
     * Generated from protobuf field <code>string customHeaders = 9;</code>
     */
    protected $customHeaders = '';
    /**
     * the name of the worker which activated this job
     *
     * Generated from protobuf field <code>string worker = 10;</code>
     */
    protected $worker = '';
    /**
     * the amount of retries left to this job (should always be positive)
     *
     * Generated from protobuf field <code>int32 retries = 11;</code>
     */
    protected $retries = 0;
    /**
     * when the job can be activated again, sent as a UNIX epoch timestamp
     *
     * Generated from protobuf field <code>int64 deadline = 12;</code>
     */
    protected $deadline = 0;
    /**
     * JSON document, computed at activation time, consisting of all visible variables to
     * the task scope
     *
     * Generated from protobuf field <code>string variables = 13;</code>
     */
    protected $variables = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $key
     *           the key, a unique identifier for the job
     *     @type string $type
     *           the type of the job (should match what was requested)
     *     @type int|string $processInstanceKey
     *           the job's process instance key
     *     @type string $bpmnProcessId
     *           the bpmn process ID of the job process definition
     *     @type int $processDefinitionVersion
     *           the version of the job process definition
     *     @type int|string $processDefinitionKey
     *           the key of the job process definition
     *     @type string $elementId
     *           the associated task element ID
     *     @type int|string $elementInstanceKey
     *           the unique key identifying the associated task, unique within the scope of the
     *           process instance
     *     @type string $customHeaders
     *           a set of custom headers defined during modelling; returned as a serialized
     *           JSON document
     *     @type string $worker
     *           the name of the worker which activated this job
     *     @type int $retries
     *           the amount of retries left to this job (should always be positive)
     *     @type int|string $deadline
     *           when the job can be activated again, sent as a UNIX epoch timestamp
     *     @type string $variables
     *           JSON document, computed at activation time, consisting of all visible variables to
     *           the task scope
     * }
     */
    public function __construct($data = NULL) {
        \Camundity\PhpZeebe\Command\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * the key, a unique identifier for the job
     *
     * Generated from protobuf field <code>int64 key = 1;</code>
     * @return int|string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * the key, a unique identifier for the job
     *
     * Generated from protobuf field <code>int64 key = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkInt64($var);
        $this->key = $var;

        return $this;
    }

    /**
     * the type of the job (should match what was requested)
     *
     * Generated from protobuf field <code>string type = 2;</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * the type of the job (should match what was requested)
     *
     * Generated from protobuf field <code>string type = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * the job's process instance key
     *
     * Generated from protobuf field <code>int64 processInstanceKey = 3;</code>
     * @return int|string
     */
    public function getProcessInstanceKey()
    {
        return $this->processInstanceKey;
    }

    /**
     * the job's process instance key
     *
     * Generated from protobuf field <code>int64 processInstanceKey = 3;</code>
     * @param int|string $var
     * @return $this
     */
    public function setProcessInstanceKey($var)
    {
        GPBUtil::checkInt64($var);
        $this->processInstanceKey = $var;

        return $this;
    }

    /**
     * the bpmn process ID of the job process definition
     *
     * Generated from protobuf field <code>string bpmnProcessId = 4;</code>
     * @return string
     */
    public function getBpmnProcessId()
    {
        return $this->bpmnProcessId;
    }

    /**
     * the bpmn process ID of the job process definition
     *
     * Generated from protobuf field <code>string bpmnProcessId = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setBpmnProcessId($var)
    {
        GPBUtil::checkString($var, True);
        $this->bpmnProcessId = $var;

        return $this;
    }

    /**
     * the version of the job process definition
     *
     * Generated from protobuf field <code>int32 processDefinitionVersion = 5;</code>
     * @return int
     */
    public function getProcessDefinitionVersion()
    {
        return $this->processDefinitionVersion;
    }

    /**
     * the version of the job process definition
     *
     * Generated from protobuf field <code>int32 processDefinitionVersion = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setProcessDefinitionVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->processDefinitionVersion = $var;

        return $this;
    }

    /**
     * the key of the job process definition
     *
     * Generated from protobuf field <code>int64 processDefinitionKey = 6;</code>
     * @return int|string
     */
    public function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    /**
     * the key of the job process definition
     *
     * Generated from protobuf field <code>int64 processDefinitionKey = 6;</code>
     * @param int|string $var
     * @return $this
     */
    public function setProcessDefinitionKey($var)
    {
        GPBUtil::checkInt64($var);
        $this->processDefinitionKey = $var;

        return $this;
    }

    /**
     * the associated task element ID
     *
     * Generated from protobuf field <code>string elementId = 7;</code>
     * @return string
     */
    public function getElementId()
    {
        return $this->elementId;
    }

    /**
     * the associated task element ID
     *
     * Generated from protobuf field <code>string elementId = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setElementId($var)
    {
        GPBUtil::checkString($var, True);
        $this->elementId = $var;

        return $this;
    }

    /**
     * the unique key identifying the associated task, unique within the scope of the
     * process instance
     *
     * Generated from protobuf field <code>int64 elementInstanceKey = 8;</code>
     * @return int|string
     */
    public function getElementInstanceKey()
    {
        return $this->elementInstanceKey;
    }

    /**
     * the unique key identifying the associated task, unique within the scope of the
     * process instance
     *
     * Generated from protobuf field <code>int64 elementInstanceKey = 8;</code>
     * @param int|string $var
     * @return $this
     */
    public function setElementInstanceKey($var)
    {
        GPBUtil::checkInt64($var);
        $this->elementInstanceKey = $var;

        return $this;
    }

    /**
     * a set of custom headers defined during modelling; returned as a serialized
     * JSON document
     *
     * Generated from protobuf field <code>string customHeaders = 9;</code>
     * @return string
     */
    public function getCustomHeaders()
    {
        return $this->customHeaders;
    }

    /**
     * a set of custom headers defined during modelling; returned as a serialized
     * JSON document
     *
     * Generated from protobuf field <code>string customHeaders = 9;</code>
     * @param string $var
     * @return $this
     */
    public function setCustomHeaders($var)
    {
        GPBUtil::checkString($var, True);
        $this->customHeaders = $var;

        return $this;
    }

    /**
     * the name of the worker which activated this job
     *
     * Generated from protobuf field <code>string worker = 10;</code>
     * @return string
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     * the name of the worker which activated this job
     *
     * Generated from protobuf field <code>string worker = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setWorker($var)
    {
        GPBUtil::checkString($var, True);
        $this->worker = $var;

        return $this;
    }

    /**
     * the amount of retries left to this job (should always be positive)
     *
     * Generated from protobuf field <code>int32 retries = 11;</code>
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * the amount of retries left to this job (should always be positive)
     *
     * Generated from protobuf field <code>int32 retries = 11;</code>
     * @param int $var
     * @return $this
     */
    public function setRetries($var)
    {
        GPBUtil::checkInt32($var);
        $this->retries = $var;

        return $this;
    }

    /**
     * when the job can be activated again, sent as a UNIX epoch timestamp
     *
     * Generated from protobuf field <code>int64 deadline = 12;</code>
     * @return int|string
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * when the job can be activated again, sent as a UNIX epoch timestamp
     *
     * Generated from protobuf field <code>int64 deadline = 12;</code>
     * @param int|string $var
     * @return $this
     */
    public function setDeadline($var)
    {
        GPBUtil::checkInt64($var);
        $this->deadline = $var;

        return $this;
    }

    /**
     * JSON document, computed at activation time, consisting of all visible variables to
     * the task scope
     *
     * Generated from protobuf field <code>string variables = 13;</code>
     * @return string
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * JSON document, computed at activation time, consisting of all visible variables to
     * the task scope
     *
     * Generated from protobuf field <code>string variables = 13;</code>
     * @param string $var
     * @return $this
     */
    public function setVariables($var)
    {
        GPBUtil::checkString($var, True);
        $this->variables = $var;

        return $this;
    }

}

