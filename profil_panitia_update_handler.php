<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $passwordRaw = $_POST['password'];

        $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

        $apiUrl = 'http://localhost:5000/api/kpu/profil_panitia/' . $id;
        $apiKey = 'api1234';

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'API_KEY:' . $apiKey
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nik, 'nama' => $nama, 'password' => $password]));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if ($httpCode == 200) {
            // Jika berhasil update, redirect index.php
            header('Location: profil_panitia.php');
        } else {
            Echo "Error,".$response;
        }
    }
} else {
    header('Location: profil_panitia.php');
}