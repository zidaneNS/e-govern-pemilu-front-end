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
function ch_img($endpoint) {
    $apiUrl = 'http://localhost:5000/api/kpu/' . $endpoint;
    $apiKey = 'api1234';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['API_KEY: ' . $apiKey]);

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
        $error = json_decode($response, true);
        $error_msg = urlencode($error['message']);
        header('Location:' . $path . "?error=$error_msg");
    }
}

function generate_password($password_raw, $endpoint) {
    $pwdCurl = ch($endpoint);
    $oldData = data_encode($pwdCurl);

    if (isset($oldData['data'][0]['password'])) {
        $actualPwd = $oldData['data'][0]['password'];
        $password = password_verify($password_raw, $actualPwd) || $password_raw == '' ? $actualPwd : password_hash($password_raw, PASSWORD_DEFAULT);
        return $password;
    } else {
        throw new ErrorException('Data dengan tidak ditemukan') ;
    }
}