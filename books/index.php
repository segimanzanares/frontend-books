<?php

require '../vendor/autoload.php';

$client = new \GuzzleHttp\Client([
    'base_uri' => 'http://localhost:8000/api/v1/',
]);
$response = $client->request('GET', 'books', [
    'headers' => [
        'Accept' => 'application/json',
    ],
    'http_errors' => false
]);
$response = $response->getBody();

global $books;
$books = json_decode($response);
include '../views/books/index.php';
