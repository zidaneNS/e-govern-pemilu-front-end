<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nik'];
    $nama = $_POST['nama'];
    $passwordRaw = $_POST['password'];

    $password = password_hash($passwordRaw, PASSWORD_DEFAULT);

    $apiUrl = 'http://localhost:5000/api/kpu/profil_panitia';
    $apiKey = 'api1234';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'API_KEY:' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nik' => $nip, 'nama' => $nama, 'password' => $password]));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 201) {
        // Jika data berhasil ditambahkan, alihkan ke index.php
        header('Location: profil_panitia.php');
        exit();
    } else {
        echo "Error: " . $response; // Menampilkan pesan error jika ada
    }
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