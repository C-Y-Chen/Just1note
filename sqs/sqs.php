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
      $this->client = SqsClient::factory($config); // config是你的aws的credentials
    }

    public function sendQueueMsg($queue_url, $msg_body)
    {
        $params = [
            'QueueUrl' => $queue_url,
            'MessageBody' => $msg_body  // 長度不超過256kb
        ];
        $result = $this->client->sendMessage($params);
    }
}