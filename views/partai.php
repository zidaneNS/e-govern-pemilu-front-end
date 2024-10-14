<?php 
require_once('../includes/function_api.php');

$ch = ch('partai');

$data = data_encode($ch);
$i = 0;

include '../includes/login_verify.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Partai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../asset/e-suara merah.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/profil_pemerintah.css">
</head>

<body>
    <div class="container">
        <?php include('../layouts/navbar_kpu.php'); ?>
        <!-- Main Content -->
        <div class="main-content">
            <h1>Input Data Partai</h1>
            <p>Tambahkan Data untuk Partai</p>
            <form action="../controller/partai_add.php" method="POST" enctype="multipart/form-data" class="mb-4">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" id="logo" name="logo" class="form-control" accept="image/*" required>
                </div>

                <?php 
                
                if (isset($_GET['blank'])) {
                    $blank = htmlspecialchars($_GET['blank']);
                    echo "<p>$blank</p>";
                }
                
                ?>

                <button type="submit" class="btn btn-danger">Tambahkan</button>
            </form>

            <!-- Tabel Data Pemerintah -->
            <h2>Data Partai</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Logo</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['data'] as $profil): ?>
                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?=$profil['nama'];?></td>
                        <td><a href="<?= $profil['logoUrl']; ?>">logo <?= $profil['nama']; ?></a></td>
                        <td>
                            <div class="action-buttons">
                                <form action="partai_update.php" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                                    <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['nama']); ?>">
                                    <input type="hidden" name="logoUrl"
                                        value="<?= htmlspecialchars($profil['logoUrl']); ?>">
                                    <input type="hidden" name="filePath"
                                        value="<?= htmlspecialchars($profil['filePath']); ?>">
                                    <button class="btn btn-warning btn" type="submit" name="submit"
                                        class="update-button">Update</button>
                                </form>

                                <form action="../controller/partai_delete.php" method="POST" style="display: inline;">
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