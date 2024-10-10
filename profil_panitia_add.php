<?php

require_once('function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nik'];
    $nama = $_POST['nama'];
    $passwordRaw = $_POST['password'];

    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

    $ch = ch('profil_panitia');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nip, 'nama' => $nama, 'password' => $password]));

    ch_redirect($ch, 'profil_panitia.php', 201);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Profile</title>
</head>

<body>
    <h1 style="text-align: center;">Add Profile</h1>
    <div class="form-container">
        <form method="POST" action="">
            <div class="form-group">
                <label for="nik">NIK:</label>
                <input type="text" id="nik" name="nik" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="password">password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>

</html>