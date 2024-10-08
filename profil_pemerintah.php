<?php 

$apiUrl = 'http://localhost:5000/kpu';
$apiKey = 'api1234';

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'API_KEY: ' . $apiKey
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

if ($httpCode == 200) {
    $data = json_decode($response, true);
} else {
    echo "Error" . $response;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil Pemerintah</title>
</head>

<body>
    <h1>Profil Pemerintah</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="profil_pemerintah_add.php" class="add-button">Add Profile</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['data'] as $profil): ?>
            <tr>
                <td><?= htmlspecialchars($profil['nip']); ?></td>
                <td><?= htmlspecialchars($profil['nama']); ?></td>
                <td>
                    <div class="action-buttons">
                        <form action="profil_pemerintah_update.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <input type="hidden" name="nip" value="<?= htmlspecialchars($profil['nip']); ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['nama']); ?>">
                            <button type="submit" name="submit" class="update-button">Update</button>
                        </form>

                        <form action="profil_pemerintah_delete.php" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <button type="submit" class="delete-button"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>