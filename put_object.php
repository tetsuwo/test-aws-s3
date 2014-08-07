<?php

require_once 'vendor/autoload.php';
require_once 'config/bucket.php';

use Aws\S3\S3Client;
use Aws\Common\Aws;

$aws = Aws::factory(sprintf('%s/config/aws.php', dirname(__FILE__)));

$client = $aws->get('s3');

$pathToFile = '/path/to/*******.jpg';

$filename = basename($pathToFile);
printf("File basename: %s\n", $filename);

$key = sprintf('xxxxx/%s', $filename);

$result = $client->putObject(array(
    'Bucket'     => BUCKET,
    'Key'        => $key,
    'SourceFile' => $pathToFile,
    'Metadata' => array(
        'Foo' => 'abc',
        'Baz' => '123'
    ),
));

$result = $client->waitUntil('ObjectExists', array(
    'Bucket' => BUCKET,
    'Key'    => $key
));

