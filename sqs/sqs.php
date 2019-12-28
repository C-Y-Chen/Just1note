<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use Aws\Sqs\SqsClient;
use Aws\Exception\AwsException;

class AmazonSQS
{
    private $config;
    private $client;

    public function __construct()
    {
      $this->client = SqsClient::factory($config);
    }

    public function sendQueueMsg($queue_url, $msg_body)
    {
        $params = [
            'QueueUrl' => $queue_url,
            'MessageBody' => $msg_body
        ];
        $result = $this->client->sendMessage($params);
    }
}