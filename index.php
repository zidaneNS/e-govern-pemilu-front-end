<?php 

$apiUrl = 'http://localhost:5000/kpu';
$jsonData = file_get_contents($apiUrl);
$data = json_decode($jsonData, true);

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
        <a href="add.php" class="add-button">Add Profile</a>
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
                        <form action="update.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <input type="hidden" name="nip" value="<?= htmlspecialchars($profil['nip']); ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['nama']); ?>">
                            <button type="submit" name="submit" class="update-button">Update</button>
                        </form>

                        <form action="delete.php" method="POST" style="display: inline;">
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