<?php

require '../vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_uri' => 'http://localhost:8000/api/v1/',
]);
$response = $client->request('GET', 'authors', [
    'headers' => [
        'Accept' => 'application/json',
    ],
    'http_errors' => false
]);
$response = $response->getBody();

global $authors;
$authors = json_decode($response);
include '../views/authors/index.php';
