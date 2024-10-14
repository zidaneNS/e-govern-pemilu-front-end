<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['nama'] !== '' && isset($_FILES['image']) && $_POST['category'] !== '' && $_POST['id_partai'] !== '') {
        include '../includes/login_verify.php';

        $nama = htmlspecialchars($_POST['nama']);
        $category = htmlspecialchars($_POST['category']);
        $id_partai = htmlspecialchars($_POST['id_partai']);
        $id_pegawai = $_SESSION['id'];
        $image = $_FILES['image'];

        $allowed_types = ['image/jpg', 'image/png', 'image/jpeg'];
        if (!in_array($image['type'], $allowed_types)) {
            $invalid = urlencode('jpg, png, jpeg file only!');
            header("Location: ../views/caleg.php?invalid=$invalid");
        }

        // Cek apakah ada error pada upload file
        if ($image['error'] !== UPLOAD_ERR_OK) {
            $uploadError = urlencode('Upload error! Please try again.');
            header("Location: ../views/caleg.php?error=$uploadError");
            exit;
        }

        $tmp_file_path = $image['tmp_name'];
        $file_name = basename($image['name']);

        require_once('../includes/function_api.php');
        $ch = ch_img('caleg');

        $c_file = new CURLFile($tmp_file_path, $image['type'], $file_name);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['nama' => $nama, 'category' => $category, 'id_partai' => (int)$id_partai, 'id_pegawai' => (int)$id_pegawai,'image' => $c_file]);

        ch_redirect($ch, '../views/caleg.php', 201);
    } else {
        $error = urlencode('complete the form!');
        header("Location: ../views/caleg.php?blank=$error");
    }
} else {
    header('Location: ../views/caleg.php');
}