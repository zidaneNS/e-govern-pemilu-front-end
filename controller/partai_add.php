<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['nama'] !== '' && isset($_FILES['logo'])) {
        $nama = htmlspecialchars($_POST['nama']);
        $logo = $_FILES['logo'];

        $allowed_types = ['image/jpg', 'image/png', 'image/jpeg'];
        if (!in_array($logo['type'], $allowed_types)) {
            $invalid = urlencode('jpg, png, jpeg file only!');
            header("Location: ../views/partai.php?invalid=$invalid");
        }

        $tmp_file_path = $logo['tmp_name'];
        $file_name = basename($logo['name']);

        require_once('../includes/function_api.php');
        $ch = ch_img('partai');

        $c_file = new CURLFile($tmp_file_path, $logo['type'], $file_name);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ['nama' => $nama,'image' => $c_file]);

        ch_redirect($ch, '../views/partai.php', 201);
    } else {
        $error = urlencode('complete the form!');
        header("Location: ../views/partai.php?blank=$error");
    }
} else {
    header('Location: ../views/partai.php');
}