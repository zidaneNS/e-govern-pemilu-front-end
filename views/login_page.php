<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemerintah | E-Suara</title>
    <link rel="shortcut icon" href="../asset/e-suara merah.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/login_page.css">
</head>

<body>
    <div class="container" id="container">

        <!--Login Form-->
        <div class="form-container sign-in">
            <form method="POST" action="../includes/login.inc.php">
                <h1>Login</h1>
                <span>Gunakan NIP dan Password</span>
                <input type="text" name="nip" placeholder="NIP" required>
                <?php 
                    if (isset($_GET['error'])) {
                        $error = htmlspecialchars($_GET['error']);
                        echo "<p>$error</p>";
                    }
                ?>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Masuk</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <img src="../asset/Side Logo.svg" alt="side-logo" class="side-logo">
                </div>
            </div>
        </div>
    </div>
</body>

</html>