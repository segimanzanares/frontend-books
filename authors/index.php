<?php

// Cargar librerías instaladas con composer
require '../vendor/autoload.php';

// Enviar petición al api para obtener un listado de autores
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
// Cargar vista del listado de autores
include '../views/authors/index.php';
