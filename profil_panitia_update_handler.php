<?php 

require_once('function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $passwordRaw = $_POST['password'];

        $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

        $ch = ch('profil_panitia/' . $id);
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nik, 'nama' => $nama, 'password' => $password]));

        ch_redirect($ch, 'profil_panitia.php', 200);
    }
} else {
    header('Location: profil_panitia.php');
}