<?php

function serveData($shortenedURL, $code = 400, $status = 'error')
{
    $result = [
        'status' => $status,
        $status == 'error' ? 'message' : 'results' => $shortenedURL
    ];
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($result);
    die();
}


require_once 'classes/Randomizer.php';
$fileLoc = './json/urls.json';

try {
    if (!isset($_POST['urlToShorten'])) {
        throw new Exception('Url not provided');
    }
    $urlToShorten = $_POST['urlToShorten'];
    if (!$urlToShorten) {
        throw new Exception('Invalid URL');
    }

    if (!file_exists($fileLoc)) {
        file_put_contents($fileLoc, json_encode([['url' => 'https://codeacademy.lt', 'id' => 'a4r3a']]));
    }
    $data = file_get_contents($fileLoc);
    $data = json_decode($data, true);

    foreach ($data as $entry) {
        if ($entry['url'] == $urlToShorten) {
            serveData($entry['id'], 200, 'duplicate');
        }
    }

    do {
        $newID = Randomizer::randomString(5);
        $idExists = false;
        foreach ($data as $entry) {
            if ($entry['id'] == $newID) {
                $idExists = true;
                break;
            }
        }
    } while ($idExists);

    $entry = ['url' => $urlToShorten, 'id' => $newID];
    array_push($data, $entry);
    file_put_contents($fileLoc, json_encode($data));
    serveData($entry, 200, 'success');
} catch (Exception $e) {
    serveData($e->getMessage(), 400, 'error');
}
