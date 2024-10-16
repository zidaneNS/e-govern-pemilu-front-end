<?php 

include '../includes/login_verify.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
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
        <form method="POST" action="../controller/profil_pemerintah_update_handler.php">
            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" id="nip" name="nip" value="<?= $nip ?>" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?= $nama ?>" required>
            </div>
            <div class="form-group">
                <label for="password">password:</label>
                <input type="password" id="password" name="password">
            </div>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <button type="submit" name="submit" class="submit-button">Submit</button>
        </form>
    </div>
</body>

</html>