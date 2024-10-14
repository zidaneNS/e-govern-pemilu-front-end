<?php 
require_once('../includes/function_api.php');

$ch = ch('caleg');
$ch_partai = ch('partai');
$ch_pemerintah = ch('profil_pemerintah');

$data = data_encode($ch);
$data_partai = data_encode($ch_partai);
$data_pemerintah = data_encode($ch_pemerintah);
$i = 0;

include '../includes/login_verify.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Caleg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../asset/e-suara merah.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/profil_pemerintah.css">
</head>

<body>
    <div class="container">
        <?php include('../layouts/navbar_kpu.php'); ?>
        <!-- Main Content -->
        <div class="main-content">
            <h1>Input Data Caleg</h1>
            <p>Tambahkan Data untuk Caleg</p>
            <form action="../controller/caleg_add.php" method="POST" enctype="multipart/form-data" class="mb-4">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select name="category" id="category">
                        <option value="">---Select Category---</option>
                        <option value="presiden wapres">Pres Wapres</option>
                        <option value="dpr">DPR</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="partai" class="form-label">Partai</label>
                    <select name="partai" id="partai" required>
                        <option value="">---Select Partai---</option>
                        <?php  
                            if ($data_partai['data'] > 0) {
                                foreach ($data_partai['data'] as $partai) :
                        ?>
                        <option value="<?= htmlspecialchars($partai['id']); ?>">
                            <?= htmlspecialchars($partai['nama']); ?>
                        </option>
                        <?php 
                                endforeach;
                            } else {
                        ?>
                        <option value="">Partai is empty</option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
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
                        <th>Profil</th>
                        <th>Nama Partai</th>
                        <th>NIP Pemerintah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['data'] as $profil): ?>
                    <tr>
                        <td><?= ++$i; ?></td>
                        <td><?=$profil['nama'];?></td>
                        <td><a href="<?= $profil['imgUrl']; ?>">Profil <?= $profil['nama']; ?></a></td>
                        <td>
                            <?php 
                                $array_id_partai = array_column($data_partai['data'], 'id');
                                $index_selected_partai = array_search($profil['id_partai'], $array_id_partai);
                                $nama_partai = $data_partai['data'][$index_selected_partai]['nama'];
                                echo "$nama_partai";
                            ?>
                        </td>
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