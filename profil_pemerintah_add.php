<?php 

require_once('includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $passwordRaw = $_POST['password'];

    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

    $ch = ch('profil_pemerintah');
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nip' => $nip, 'nama' => $nama, 'password' => $password]));

    ch_redirect($ch, 'profil_pemerintah.php', 201);
}