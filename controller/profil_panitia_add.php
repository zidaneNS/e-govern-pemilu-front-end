<?php

require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nik'];
    $nama = $_POST['nama'];
    $passwordRaw = $_POST['password'];

    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

    $ch = ch('profil_panitia');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nip, 'nama' => $nama, 'password' => $password]));

    ch_redirect($ch, '../views/profil_panitia.php', 201);
}