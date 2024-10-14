<?php
require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = htmlspecialchars($_POST['nama']);
        
        $stmt = ['nama' => $nama];

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
            $allowed_types = ['image/jpg', 'image/png', 'image/jpeg'];
            if (!in_array($_FILES['logo']['type'], $allowed_types)) {
                die('File type not allowed.');
            }
        
            $tmp_file_path = $_FILES['logo']['tmp_name'];
            $file_name = basename($_FILES['logo']['name']);
            $c_file = new CURLFile($tmp_file_path, $_FILES['logo']['type'], $file_name);
            
            // Tambahkan file ke data yang akan dikirim
            $stmt['image'] = $c_file;
        }
        

        $ch = ch_img('partai/' . $id);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stmt);
        
        // Redirect setelah berhasil mengirim
        ch_redirect($ch, '../views/partai.php', 200);
    } else {
        header('Location: ../views/profil_pemerintah.php');
    }
} else {
    header('Location: ../views/profil_pemerintah.php');
    exit();
}