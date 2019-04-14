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
    include '../views/authors/form.php';
}
else if ($action === 'store') {
    $response = store($data);
    http_response_code($response->getStatusCode());
    echo $response->getBody();
}

function store($data) {
    $client = new \GuzzleHttp\Client([
        'base_uri' => 'http://localhost:8000/api/v1/',
    ]);
    $response = $client->request('POST', 'authors/', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => $data,
        'http_errors' => false
    ]);
    return $response;
}