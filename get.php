<?php

// Include the SDK using the Composer autoloader
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Common\Aws;

// Create a service locator using a configuration file
$aws = Aws::factory(sprintf('%s/config.php', dirname(__FILE__)));

// Get client instances from the service locator by name
$client = $aws->get('s3');

$iterator = $client->getIterator('ListObjects', array('Bucket' => 'demo'));

foreach ($iterator as $object) {
    echo $object['Key'] . "\n";
}
