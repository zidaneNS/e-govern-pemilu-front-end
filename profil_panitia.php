<?php 

require_once('function_api.php');

$ch = ch('profil_panitia');

$data = data_encode($ch);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil Panitia</title>
</head>

<body>
    <div class="form-container">
        <form method="POST" action="profil_panitia_add.php">
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
    <h1>Profil Panitia</h1>
    <div style="text-align: center; margin-bottom: 20px;">
        <a href="profil_panitia_add.php" class="add-button">Add Profile</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['data'] as $profil): ?>
            <tr>
                <td><?= htmlspecialchars($profil['nik']); ?></td>
                <td><?= htmlspecialchars($profil['nama']); ?></td>
                <td>
                    <div class="action-buttons">
                        <form action="profil_panitia_update.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <input type="hidden" name="nik" value="<?= htmlspecialchars($profil['nik']); ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['nama']); ?>">
                            <button type="submit" name="submit" class="update-button">Update</button>
                        </form>

                        <form action="profil_panitia_delete.php" method="POST" style="display: inline;">
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