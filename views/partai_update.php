<?php 

include '../includes/login_verify.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $logo_url = $_POST['logoUrl'];
        $file_path = $_POST['filePath'];
    }
} else {
    header('Location: profil_pemerintah.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Profile</title>
</head>

<body>
    <h1 style="text-align: center;">Update Profile</h1>
    <div class="form-container">
        <form method="POST" action="../controller/partai_update_handler.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama"
                    value="<?= htmlspecialchars($nama); ?>" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" id="logo" name="logo" class="form-control" accept="image/*">
            </div>

            <input type="hidden" name="id" value="<?= htmlspecialchars($id); ?>">

            <button name="submit" type="submit" class="btn btn-danger">Tambahkan</button>
        </form>
    </div>
</body>

</html>