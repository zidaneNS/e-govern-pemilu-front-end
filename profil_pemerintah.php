<?php 
require_once('includes/function_api.php');

$ch = ch('profil_pemerintah');

$data = data_encode($ch);

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

    <h1 style="text-align: center;">Add Profile</h1>
    <div class="form-container">
        <form method="POST" action="profil_pemerintah_add.php">
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" required>
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