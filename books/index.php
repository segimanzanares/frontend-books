<?php

// Cargar librerías instaladas con composer
require '../vendor/autoload.php';

// Enviar petición al api para obtener un listado de libros
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
// Cargar vista del listado de libros
include '../views/books/index.php';
