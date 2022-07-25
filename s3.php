<?php

require_once 'vendor/autoload.php';

use Aws\S3\S3Client;

$config = [
    'credentials' => [
        'key' => 'dummy',
        'secret' => 'dummy',
    ],
    'region' => 'ap-northeast-1',
    'version' => 'latest',
    'endpoint' => 'http://localhost:4566',
    'use_path_style_endpoint' => true,
];

$s3 = new S3Client($config);

// アップロード
$result = $s3->putObject([
    'Bucket' => 'local-test',  // バケット名
    'Key' => 'hello.txt',      // s3のアップロード先
    'Body' => 'hello world!!', // ファイルの内容
]);

echo 'ファイルのURL => ' . $result['ObjectURL'] . PHP_EOL;

// 内容の取得
$result = $s3->getObject([
    'Bucket' => 'local-test',  // バケット名
    'Key' => 'hello.txt',      // s3のアップロード先
]);

echo 'ファイルの内容 => ' . $result['Body'] . PHP_EOL;
