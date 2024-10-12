<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip = $_POST['nip'];
    $password = $_POST['password'];

    require_once('function_api.php');

    $ch = ch('profil_pemerintah/login/' . $nip);
    $data = data_encode($ch)['data'][0];

    if (!(password_verify($password, $data['password']) && $nip === $data['nip'])) {
        header('Location: ../views/login_page.php');
    } else {
        include 'config_session.inc.php';
        $_SESSION['nip'] = $data['nip'];
        $_SESSION['nama'] = $data['nama'];

        header('Location: ../views/profil_panitia.php');
    }
}