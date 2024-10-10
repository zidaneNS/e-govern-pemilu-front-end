<?php
function ch($endpoint) {
    $apiUrl = 'http://localhost:5000/api/kpu/' . $endpoint;
    $apiKey = 'api1234';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'API_KEY: ' . $apiKey
    ]);

    return $ch;
}

function data_encode($ch) {
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode == 200) {
        $data = json_decode($response, true);
    } else {
        echo "Error" . $response;
    }

    return $data;
}

function ch_redirect($ch, $path, $code) {
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($httpCode == $code) {
        // Jika berhasil update, redirect index.php
        header('Location: ' . $path);
    } else {
        Echo "Error,".$response;
    }
}