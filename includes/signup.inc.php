<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config_session.inc.php';

    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $password_raw = $_POST['password'];

    $password = password_hash($password_raw, PASSWORD_DEFAULT);
    require_once('function_api.php');

    $ch = ch('profil_pemerintah');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nip' => $nip, 'nama' => $nama, 'password' => $password]));

    ch_redirect($ch, '../views/login_page.php', 201);

} else {
    header('Location: ../views/login_page.php');
}