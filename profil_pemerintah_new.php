<?php 
require_once('function_api.php');

$ch = ch('profil_pemerintah');

$data = data_encode($ch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pemerintah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="profil_pemerintah.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="profile">
                <div class="profile-icon">
                    <img src="asset/icon _user_.png" alt="Profile Icon" class="img-fluid rounded-circle" width="80">
                </div>
                <p>Nama</p>
                <p>NIP</p>
            </div>
            <ul class="menu">
                <li>
                    <a href="#">
                        <img src="asset/Vector.png" alt="Icon" class="menu-icon me-2"> Pemerintah
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="asset/Vector.png" alt="Icon" class="menu-icon me-2"> Partai
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="asset/Vector.png" alt="Icon" class="menu-icon me-2"> Caleg
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="asset/Vector.png" alt="Icon" class="menu-icon me-2"> Panitia TPS
                    </a>
                </li>
            </ul>
            
            <div class="logout">
                <a href="#" class="d-flex align-items-center">
                    <img src="asset/Subtract.svg" alt="Logout Icon" class="logout-icon me-2">Log Out
                </a>
            </div>
            
            <div class="logo">
                <img src="asset/Logo Side Bar.svg" alt="Logo-side-bar" class="img-fluid">
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Input Data Pemerintah</h1>
            <p>Tambahkan Data untuk Pemerintah</p>
            <form action="POST" method="profil_pemerintah_add.php" class="mb-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                
                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" id="nip" name="nip" class="form-control" placeholder="Masukkan NIP" required>
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" required>
                </div>
                
                <button type="submit" class="btn btn-danger">Tambahkan</button>
            </form>

            <!-- Tabel Data Pemerintah -->
            <h2>Data Pemerintah</h2>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['data'] as $profil): ?>
                    <tr>
                        <td><?=htmlspecialchars($profil['nip']);?></td>
                        <td><?=htmlspecialchars($profil['nama']);?></td>
                        <td>
                        <div class="action-buttons">
                        <form action="profil_pemerintah_update.php" method="post" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <input type="hidden" name="nip" value="<?= htmlspecialchars($profil['nip']); ?>">
                            <input type="hidden" name="nama" value="<?= htmlspecialchars($profil['nama']); ?>">
                            <button class="btn btn-warning btn-sm" type="submit" name="submit" class="update-button">Update</button>
                        </form>

                        <form action="profil_pemerintah_delete.php" method="POST" style="display: inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($profil['id']); ?>">
                            <button class="btn btn-danger btn-sm" type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</button>
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
