const AWS = require("aws-sdk");
const sqs = new AWS.SQS({apiVersion: '2012-11-05'});
const QUEUE_URL = 'QUEUE_URL_FROM_SQS_MANAGEMENT_CONSOLE';

const params = {
  MessageBody: 'test message body',
  QueueUrl: QUEUE_URL
};
sqs.sendMessage(params, function(err, data) {
  if (err) console.log(err, err.stack); // an error occurred
  else     console.log(data);           // successful response
});