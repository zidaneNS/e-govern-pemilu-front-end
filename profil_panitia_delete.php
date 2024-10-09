<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];

    $apiUrl = 'http://localhost:5000/api/kpu/profil_panitia/' . $id;
    $apiKey = 'api1234';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'API_KEY:' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id' => $id]));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 200) {
        header('Location: profil_panitia.php');
        exit();
    } else {
        echo "Error: " . $response;
    }
}