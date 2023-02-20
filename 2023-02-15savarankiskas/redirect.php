<?php

$fileLoc = './json/urls.json';
if(isset($_GET['code'])){
    $codeToDecode = $_GET['code'];
    $data = file_get_contents($fileLoc);
    $data = json_decode($data, true);
    foreach ($data as $entry) {
        if ($entry['id'] == $codeToDecode){
            $result = $entry['url'];
            break;
        }
    }
    if(isset($result)){
        header('Location: https://'. $result);
    } else {
        echo 'Code ' . $codeToDecode . ' does not have an associated link. :(';
    }
} else {
    header('Location: localhost');
}

