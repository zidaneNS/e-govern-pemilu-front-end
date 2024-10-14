<?php
require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = htmlspecialchars($_POST['nama']);
        $category = htmlspecialchars($_POST['category']);
        $id_pegawai = $_POST['id_pegawai'];
        $id_partai = $_POST['id_partai'];
        
        $stmt = ['nama' => $nama, 'category' => $category, 'id_pegawai' => $id_pegawai, 'id_partai' => $id_partai];

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $allowed_types = ['image/jpg', 'image/png', 'image/jpeg'];
            if (!in_array($_FILES['image']['type'], $allowed_types)) {
                die('File type not allowed.');
            }
        
            $tmp_file_path = $_FILES['image']['tmp_name'];
            $file_name = basename($_FILES['image']['name']);
            $c_file = new CURLFile($tmp_file_path, $_FILES['image']['type'], $file_name);
            
            // Tambahkan file ke data yang akan dikirim
            $stmt['image'] = $c_file;
        }
        

        $ch = ch_img('caleg/' . $id);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $stmt);
        
        // Redirect setelah berhasil mengirim
        ch_redirect($ch, '../views/caleg.php', 200);
    } else {
        header('Location: ../views/caleg.php');
        exit;
    }
} else {
    header('Location: ../views/caleg.php');
    exit;
}