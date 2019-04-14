<?php


require '../vendor/autoload.php';

$response = null;
$method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
$data = json_decode(file_get_contents('php://input'), true);
$action = 'create';
if (isset($data['action'])) {
    $action = $data['action'];
}
if ($action === 'create') {
    global $authors;
    $authors = getAuthors();
    include '../views/books/form.php';
}
else if ($action === 'store') {
    $response = store($data);
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}

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