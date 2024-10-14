<?php 

require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['nip'] !== '' && $_POST['nip'] !== '' && $_POST['nip'] !== '') {
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $password_raw = $_POST['password'];
    
        $password = password_hash($password_raw, PASSWORD_DEFAULT);
    
        $ch = ch('profil_pemerintah');
        
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nip' => $nip, 'nama' => $nama, 'password' => $password]));
    
        ch_redirect($ch, '../views/profil_pemerintah.php', 201);
    } else {
        $error = urlencode('complete the form!');
        header("Location: ../views/profil_pemerintah.php?blank=$error");
    }
} else {
    header('Location: ../views/profil_pemerintah.php');
    exit;
}