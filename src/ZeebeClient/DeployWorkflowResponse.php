<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace ZeebeClient;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.DeployWorkflowResponse</code>
 */
class DeployWorkflowResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * the unique key identifying the deployment
     *
     * Generated from protobuf field <code>int64 key = 1;</code>
     */
    private $key = 0;
    /**
     * a list of deployed workflows
     *
     * Generated from protobuf field <code>repeated .gateway_protocol.WorkflowMetadata workflows = 2;</code>
     */
    private $workflows;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $key
     *           the unique key identifying the deployment
     *     @type \ZeebeClient\WorkflowMetadata[]|\Google\Protobuf\Internal\RepeatedField $workflows
     *           a list of deployed workflows
     * }
     */
    public function __construct($data = NULL) {
        \ZeebeClient\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * the unique key identifying the deployment
     *
     * Generated from protobuf field <code>int64 key = 1;</code>
     * @return int|string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * the unique key identifying the deployment
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
     * a list of deployed workflows
     *
     * Generated from protobuf field <code>repeated .gateway_protocol.WorkflowMetadata workflows = 2;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getWorkflows()
    {
        return $this->workflows;
    }

    /**
     * a list of deployed workflows
     *
     * Generated from protobuf field <code>repeated .gateway_protocol.WorkflowMetadata workflows = 2;</code>
     * @param \ZeebeClient\WorkflowMetadata[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setWorkflows($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \ZeebeClient\WorkflowMetadata::class);
        $this->workflows = $arr;

        return $this;
    }

}

