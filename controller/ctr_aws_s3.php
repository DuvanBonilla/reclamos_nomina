<?php

require './../vendor/autoload.php';

use Aws\S3\S3Client;

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable('./../');
$dotenv->load();


$s3 = new S3Client([
    'version' => 'latest',
    'region' => $_ENV['S3REGION'],
    'credentials' => [
        'key' => $_ENV['S3KEY'],
        'secret' => $_ENV['S3SECRET'],
    ],
]);


function uploadFile($key, $archivo)
{

    global $s3;

    try {
        $s3->putObject([
            'Bucket' => $_ENV['S3BUCKET'],
            'Body' => fopen($archivo, 'rb'),
            'Key' => $key,
            'ContentType' => mime_content_type($archivo),
        ]);
        return true;
    } catch (\Throwable $th) {
        return false;
    }
}

function getFile($key)
{
    global $s3;
    try {
        $result = $s3->getObject([
            'Bucket' => $_ENV['S3BUCKET'],
            'Key' => $key,
        ]);
        return $result;
    } catch (\Throwable $th) {
        return false;
    }
}