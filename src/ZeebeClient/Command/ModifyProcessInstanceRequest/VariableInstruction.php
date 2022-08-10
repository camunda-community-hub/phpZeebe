<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace ZeebeClient\Command\ModifyProcessInstanceRequest;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.ModifyProcessInstanceRequest.VariableInstruction</code>
 */
class VariableInstruction extends \Google\Protobuf\Internal\Message
{
    /**
     * JSON document that will instantiate the variables for the root variable scope of the
     * process instance; it must be a JSON object, as variables will be mapped in a
     * key-value fashion. e.g. { "a": 1, "b": 2 } will create two variables, named "a" and
     * "b" respectively, with their associated values. [{ "a": 1, "b": 2 }] would not be a
     * valid argument, as the root of the JSON document is an array and not an object.
     *
     * Generated from protobuf field <code>string variables = 1;</code>
     */
    protected $variables = '';
    /**
     * the id of the element in which scope the variables should be created;
     * leave empty to create the variables in the global scope of the process instance
     *
     * Generated from protobuf field <code>string scopeId = 2;</code>
     */
    protected $scopeId = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $variables
     *           JSON document that will instantiate the variables for the root variable scope of the
     *           process instance; it must be a JSON object, as variables will be mapped in a
     *           key-value fashion. e.g. { "a": 1, "b": 2 } will create two variables, named "a" and
     *           "b" respectively, with their associated values. [{ "a": 1, "b": 2 }] would not be a
     *           valid argument, as the root of the JSON document is an array and not an object.
     *     @type string $scopeId
     *           the id of the element in which scope the variables should be created;
     *           leave empty to create the variables in the global scope of the process instance
     * }
     */
    public function __construct($data = NULL) {
        \ZeebeClient\Command\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * JSON document that will instantiate the variables for the root variable scope of the
     * process instance; it must be a JSON object, as variables will be mapped in a
     * key-value fashion. e.g. { "a": 1, "b": 2 } will create two variables, named "a" and
     * "b" respectively, with their associated values. [{ "a": 1, "b": 2 }] would not be a
     * valid argument, as the root of the JSON document is an array and not an object.
     *
     * Generated from protobuf field <code>string variables = 1;</code>
     * @return string
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * JSON document that will instantiate the variables for the root variable scope of the
     * process instance; it must be a JSON object, as variables will be mapped in a
     * key-value fashion. e.g. { "a": 1, "b": 2 } will create two variables, named "a" and
     * "b" respectively, with their associated values. [{ "a": 1, "b": 2 }] would not be a
     * valid argument, as the root of the JSON document is an array and not an object.
     *
     * Generated from protobuf field <code>string variables = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setVariables($var)
    {
        GPBUtil::checkString($var, True);
        $this->variables = $var;

        return $this;
    }

    /**
     * the id of the element in which scope the variables should be created;
     * leave empty to create the variables in the global scope of the process instance
     *
     * Generated from protobuf field <code>string scopeId = 2;</code>
     * @return string
     */
    public function getScopeId()
    {
        return $this->scopeId;
    }

    /**
     * the id of the element in which scope the variables should be created;
     * leave empty to create the variables in the global scope of the process instance
     *
     * Generated from protobuf field <code>string scopeId = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setScopeId($var)
    {
        GPBUtil::checkString($var, True);
        $this->scopeId = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VariableInstruction::class, \ZeebeClient\Command\ModifyProcessInstanceRequest_VariableInstruction::class);

