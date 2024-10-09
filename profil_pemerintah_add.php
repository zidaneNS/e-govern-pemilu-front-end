<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];

    $apiUrl = 'http://localhost:5000/api/kpu/profil_pemerintah';
    $apiKey = 'api1234';

    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'API_KEY:' . $apiKey
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nip' => $nip, 'nama' => $nama]));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode === 201) {
        // Jika data berhasil ditambahkan, alihkan ke index.php
        header('Location: profil_pemerintah.php');
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
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>

</html>