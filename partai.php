<?php 
require_once('includes/function_api.php');

$ch = ch('partai');

$data = data_encode($ch);   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Partai</title>
</head>

<body>
    <h1>Partai</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="partai_add.php" class="add-button">Tambah Partai</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Logo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['data'] as $profil): ?>
            <tr>
                <td><?= htmlspecialchars($profil['nama']); ?></td>
                <td><a href="<?= $profil['logoUrl'] ?>">logo <?= $profil['nama'] ?></a></td>
                <td>
                    <div class="action-buttons">
                        <form action="partai_update.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <input type="hidden" name="nip" value="<?= htmlspecialchars($profil['nama']); ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['logoUrl']); ?>">
                            <button type="submit" name="submit" class="update-button">Update</button>
                        </form>

                        <form action="partai_delete.php" method="POST" style="display: inline;">
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