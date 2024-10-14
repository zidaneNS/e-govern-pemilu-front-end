<?php 

include '../includes/login_verify.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = htmlspecialchars($_POST['id']);
    $nama = htmlspecialchars($_POST['nama']);
    $category = htmlspecialchars($_POST['category']);
    $id_partai = htmlspecialchars($_POST['id_partai']);
    $id_pegawai = $_SESSION['id'];

} else {
    header('Location: partai.php');
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
        <form action="../controller/caleg_update_handler.php" method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama"
                    value="<?= $nama; ?>">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <select name="category" id="category">
                    <option value="<?= $category; ?>">---Select Category---</option>
                    <option value="presiden wapres">Pres Wapres</option>
                    <option value="dpr">DPR</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_partai" class="form-label">Partai</label>
                <select name="id_partai" id="id_partai">
                    <option value="<?= $id_partai; ?>">---Select Partai---</option>
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
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
            </div>
            <?php 
                if (isset($_GET['blank'])) {
                    $blank = htmlspecialchars($_GET['blank']);
                    echo "<p>$blank</p>";
                }
                if (isset($_GET['invalid'])) {
                    $invalid = htmlspecialchars($_GET['invalid']);
                    echo "<p>$invalid</p>";
                }
            ?>
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="id_pegawai" value="<?= $_SESSION['id']; ?>">

            <button type="submit" name="submit" class="btn btn-danger">Tambahkan</button>
        </form>
    </div>
</body>

</html>