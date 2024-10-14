<?php

require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['nik'] !== '' && $_POST['nama'] !== '' && $_POST['password'] !== '') {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $password_raw = $_POST['password'];
    
        $password = password_hash($password_raw, PASSWORD_DEFAULT);
    
        $ch = ch('profil_panitia');
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nik, 'nama' => $nama, 'password' => $password]));
    
        ch_redirect($ch, '../views/profil_panitia.php', 201);
    } else {
        $error = urlencode('complete the form!');
        header("Location: ../views/profil_panitia.php?blank=$error");
    }
} else {
    header('Location: ../views/profil_panitia.php');
    exit;
}