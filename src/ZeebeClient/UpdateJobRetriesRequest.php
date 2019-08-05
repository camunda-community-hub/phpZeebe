<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace ZeebeClient;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.UpdateJobRetriesRequest</code>
 */
class UpdateJobRetriesRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * the unique job identifier, as obtained through ActivateJobs
     *
     * Generated from protobuf field <code>int64 jobKey = 1;</code>
     */
    private $jobKey = 0;
    /**
     * the new amount of retries for the job; must be positive
     *
     * Generated from protobuf field <code>int32 retries = 2;</code>
     */
    private $retries = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $jobKey
     *           the unique job identifier, as obtained through ActivateJobs
     *     @type int $retries
     *           the new amount of retries for the job; must be positive
     * }
     */
    public function __construct($data = NULL) {
        \ZeebeClient\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * the unique job identifier, as obtained through ActivateJobs
     *
     * Generated from protobuf field <code>int64 jobKey = 1;</code>
     * @return int|string
     */
    public function getJobKey()
    {
        return $this->jobKey;
    }

    /**
     * the unique job identifier, as obtained through ActivateJobs
     *
     * Generated from protobuf field <code>int64 jobKey = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setJobKey($var)
    {
        GPBUtil::checkInt64($var);
        $this->jobKey = $var;

        return $this;
    }

    /**
     * the new amount of retries for the job; must be positive
     *
     * Generated from protobuf field <code>int32 retries = 2;</code>
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * the new amount of retries for the job; must be positive
     *
     * Generated from protobuf field <code>int32 retries = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setRetries($var)
    {
        GPBUtil::checkInt32($var);
        $this->retries = $var;

        return $this;
    }

}

