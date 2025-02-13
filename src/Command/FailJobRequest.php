<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: zeebe.proto

namespace Camundity\PhpZeebe\Command;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>gateway_protocol.FailJobRequest</code>
 */
class FailJobRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * the unique job identifier, as obtained when activating the job
     *
     * Generated from protobuf field <code>int64 jobKey = 1;</code>
     */
    protected $jobKey = 0;
    /**
     * the amount of retries the job should have left
     *
     * Generated from protobuf field <code>int32 retries = 2;</code>
     */
    protected $retries = 0;
    /**
     * an optional message describing why the job failed
     * this is particularly useful if a job runs out of retries and an incident is raised,
     * as it this message can help explain why an incident was raised
     *
     * Generated from protobuf field <code>string errorMessage = 3;</code>
     */
    protected $errorMessage = '';
    /**
     * the backoff timeout for the next retry
     *
     * Generated from protobuf field <code>int64 retryBackOff = 4;</code>
     */
    protected $retryBackOff = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $jobKey
     *           the unique job identifier, as obtained when activating the job
     *     @type int $retries
     *           the amount of retries the job should have left
     *     @type string $errorMessage
     *           an optional message describing why the job failed
     *           this is particularly useful if a job runs out of retries and an incident is raised,
     *           as it this message can help explain why an incident was raised
     *     @type int|string $retryBackOff
     *           the backoff timeout for the next retry
     * }
     */
    public function __construct($data = NULL) {
        \Camundity\PhpZeebe\Command\Zeebe::initOnce();
        parent::__construct($data);
    }

    /**
     * the unique job identifier, as obtained when activating the job
     *
     * Generated from protobuf field <code>int64 jobKey = 1;</code>
     * @return int|string
     */
    public function getJobKey()
    {
        return $this->jobKey;
    }

    /**
     * the unique job identifier, as obtained when activating the job
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
     * the amount of retries the job should have left
     *
     * Generated from protobuf field <code>int32 retries = 2;</code>
     * @return int
     */
    public function getRetries()
    {
        return $this->retries;
    }

    /**
     * the amount of retries the job should have left
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

    /**
     * an optional message describing why the job failed
     * this is particularly useful if a job runs out of retries and an incident is raised,
     * as it this message can help explain why an incident was raised
     *
     * Generated from protobuf field <code>string errorMessage = 3;</code>
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * an optional message describing why the job failed
     * this is particularly useful if a job runs out of retries and an incident is raised,
     * as it this message can help explain why an incident was raised
     *
     * Generated from protobuf field <code>string errorMessage = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setErrorMessage($var)
    {
        GPBUtil::checkString($var, True);
        $this->errorMessage = $var;

        return $this;
    }

    /**
     * the backoff timeout for the next retry
     *
     * Generated from protobuf field <code>int64 retryBackOff = 4;</code>
     * @return int|string
     */
    public function getRetryBackOff()
    {
        return $this->retryBackOff;
    }

    /**
     * the backoff timeout for the next retry
     *
     * Generated from protobuf field <code>int64 retryBackOff = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setRetryBackOff($var)
    {
        GPBUtil::checkInt64($var);
        $this->retryBackOff = $var;

        return $this;
    }

}

