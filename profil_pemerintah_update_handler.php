<?php 

require_once('function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $passwordRaw = $_POST['password'];

        try {
            $password = generate_password($passwordRaw, 'profil_pemerintah/' . $id);
            $ch = ch('profil_pemerintah/' . $id);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nip' => $nip, 'nama' => $nama, 'password' => $password]));

            // Redirect setelah update
            ch_redirect($ch, 'profil_pemerintah.php', 200);
            exit();
        } catch (ErrorException $e) {
            echo 'error: ' . $e->getMessage();
        }
    }
} else {
    header('Location: profil_pemerintah.php');
    exit();
}