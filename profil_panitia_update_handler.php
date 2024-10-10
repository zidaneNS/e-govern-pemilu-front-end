<?php 

require_once('function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $password_raw = $_POST['password'];

        try {
            $password = generate_password($password_raw, 'profil_panitia/' . $id);
            $ch = ch('profil_panitia/' . $id);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nik, 'nama' => $nama, 'password' => $password]));

            // Redirect setelah update
            ch_redirect($ch, 'profil_panitia.php', 200);
            exit();
        } catch (ErrorException $e) {
            echo 'error: ' . $e->getMessage();
        }
    }
} else {
    header('Location: profil_panitia.php');
}