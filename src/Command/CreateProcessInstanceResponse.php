<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace Camundity\PhpZeebe\Command;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.CreateProcessInstanceResponse</code>
 */
class CreateProcessInstanceResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * the key of the process definition which was used to create the process instance
     *
     * Generated from protobuf field <code>int64 processDefinitionKey = 1;</code>
     */
    protected $processDefinitionKey = 0;
    /**
     * the BPMN process ID of the process definition which was used to create the process
     * instance
     *
     * Generated from protobuf field <code>string bpmnProcessId = 2;</code>
     */
    protected $bpmnProcessId = '';
    /**
     * the version of the process definition which was used to create the process instance
     *
     * Generated from protobuf field <code>int32 version = 3;</code>
     */
    protected $version = 0;
    /**
     * the unique identifier of the created process instance; to be used wherever a request
     * needs a process instance key (e.g. CancelProcessInstanceRequest)
     *
     * Generated from protobuf field <code>int64 processInstanceKey = 4;</code>
     */
    protected $processInstanceKey = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $processDefinitionKey
     *           the key of the process definition which was used to create the process instance
     *     @type string $bpmnProcessId
     *           the BPMN process ID of the process definition which was used to create the process
     *           instance
     *     @type int $version
     *           the version of the process definition which was used to create the process instance
     *     @type int|string $processInstanceKey
     *           the unique identifier of the created process instance; to be used wherever a request
     *           needs a process instance key (e.g. CancelProcessInstanceRequest)
     * }
     */
    public function __construct($data = NULL) {
        \Camundity\PhpZeebe\Command\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * the key of the process definition which was used to create the process instance
     *
     * Generated from protobuf field <code>int64 processDefinitionKey = 1;</code>
     * @return int|string
     */
    public function getProcessDefinitionKey()
    {
        return $this->processDefinitionKey;
    }

    /**
     * the key of the process definition which was used to create the process instance
     *
     * Generated from protobuf field <code>int64 processDefinitionKey = 1;</code>
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
     * the BPMN process ID of the process definition which was used to create the process
     * instance
     *
     * Generated from protobuf field <code>string bpmnProcessId = 2;</code>
     * @return string
     */
    public function getBpmnProcessId()
    {
        return $this->bpmnProcessId;
    }

    /**
     * the BPMN process ID of the process definition which was used to create the process
     * instance
     *
     * Generated from protobuf field <code>string bpmnProcessId = 2;</code>
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
     * the version of the process definition which was used to create the process instance
     *
     * Generated from protobuf field <code>int32 version = 3;</code>
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * the version of the process definition which was used to create the process instance
     *
     * Generated from protobuf field <code>int32 version = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setVersion($var)
    {
        GPBUtil::checkInt32($var);
        $this->version = $var;

        return $this;
    }

    /**
     * the unique identifier of the created process instance; to be used wherever a request
     * needs a process instance key (e.g. CancelProcessInstanceRequest)
     *
     * Generated from protobuf field <code>int64 processInstanceKey = 4;</code>
     * @return int|string
     */
    public function getProcessInstanceKey()
    {
        return $this->processInstanceKey;
    }

    /**
     * the unique identifier of the created process instance; to be used wherever a request
     * needs a process instance key (e.g. CancelProcessInstanceRequest)
     *
     * Generated from protobuf field <code>int64 processInstanceKey = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setProcessInstanceKey($var)
    {
        GPBUtil::checkInt64($var);
        $this->processInstanceKey = $var;

        return $this;
    }

}

