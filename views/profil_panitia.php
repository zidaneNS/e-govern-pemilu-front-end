<?php 
require_once('../includes/function_api.php');

$ch = ch('profil_panitia');

$data = data_encode($ch);
$i = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Panitia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/profil_pemerintah.css">
</head>

<body>
    <div class="container">
        <?php include('../layouts/navbar_kpu.php'); ?>
        <!-- Main Content -->
        <div class="main-content">
            <h1>Input Data Panitia</h1>
            <p>Tambahkan Data untuk Panitia</p>
            <form action="../controller/profil_panitia_add.php" method="POST" class="mb-4">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" id="nik" name="nik" class="form-control" placeholder="Masukkan NIK" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Masukkan Password" required>
                </div>

                <button type="submit" class="btn btn-danger">Tambahkan</button>
            </form>

            <!-- Tabel Data Pemerintah -->
            <h2>Data Panitia</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['data'] as $profil): ?>
                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?=htmlspecialchars($profil['nik']);?></td>
                        <td><?=htmlspecialchars($profil['nama']);?></td>
                        <td>
                            <div class="action-buttons">
                                <form action="profil_panitia_update.php" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                                    <input type="hidden" name="nik" value="<?= htmlspecialchars($profil['nik']); ?>">
                                    <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['nama']); ?>">
                                    <button class="btn btn-warning btn-sm" type="submit" name="submit"
                                        class="update-button">Update</button>
                                </form>

                                <form action="../controller/profil_panitia_delete.php" method="POST"
                                    style="display: inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                                    <button class="btn btn-danger btn-sm" type="submit" class="delete-button"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</button>
                                </form>
                            </div>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>