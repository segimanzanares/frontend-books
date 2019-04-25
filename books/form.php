<?php

// Cargar librerías instaladas con composer
require '../vendor/autoload.php';

$response = null;
// Obtener método HTTP usado en la petición
$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
// Obtener datos enviados en la petición
$data = json_decode(file_get_contents('php://input'), true);
$action = 'create';
if (isset($data['action'])) {
    $action = $data['action'];
}
// Visualizar formulario de libros
if ($action === 'create') {
    global $authors;
    // Obtener listado de autores
    $authors = getAuthors();
    // Cargar vista del formulario de libros
    include '../views/books/form.php';
}
// Enviar datos al api
else if ($action === 'store') {
    $response = store($data);
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}
/**
 * Enviar petición al api para obtener un listado de autores.
 */
function getAuthors() {
    $client = new \GuzzleHttp\Client([
        'base_uri' => 'http://localhost:8000/api/v1/',
    ]);
    $response = $client->request('GET', 'authors', [
        'headers' => [
            'Accept' => 'application/json',
        ],
        'http_errors' => false
    ]);
    return json_decode($response->getBody());
}
/**
 * Enviar petición al api para crear un nuevo registro
 */
function store($data) {
    $client = new \GuzzleHttp\Client([
        'base_uri' => 'http://localhost:8000/api/v1/',
    ]);
    $response = $client->request('POST', 'books/', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => $data,
        'http_errors' => false
    ]);
    return $response;
}