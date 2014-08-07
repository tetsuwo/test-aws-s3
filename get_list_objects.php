<?php

require_once 'vendor/autoload.php';
require_once 'config/bucket.php';

use Aws\S3\S3Client;
use Aws\Common\Aws;

$aws = Aws::factory(sprintf('%s/config/aws.php', dirname(__FILE__)));

$client = $aws->get('s3');

$iterator = $client->getIterator('ListObjects', array('Bucket' => BUCKET));

foreach ($iterator as $object) {
    echo $object['Key'] . "\n";
}

