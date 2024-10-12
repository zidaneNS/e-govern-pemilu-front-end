<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pemerintah | E-Suara</title>
    <link rel="stylesheet" href="../css/login_page.css">
</head>

<body>
    <div class="container" id="container">

        <!--Sign Up Form-->
        <div class="form-container sign-up">
            <form method="POST" action="../includes/signup.inc.php">
                <h1>Buat Akun</h1>
                <span>Gunakan Nama, NIP, dan Password</span>
                <input type="text" placeholder="Nama" required>
                <input type="text" placeholder="NIP" required>
                <input type="password" placeholder="Password" required>
                <button>Daftar</button>
            </form>
        </div>
        <!-- iki ndukur hapusen ae sg sign up -->

        <!--Sign In Form-->
        <div class="form-container sign-in">
            <form method="POST" action="../includes/login.inc.php">
                <h1>Login</h1>
                <span>Gunakan NIP dan Password</span>
                <input type="text" name="nip" placeholder="NIP" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="#">Lupa Password</a>
                <button type="submit">Masuk</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="asset/Side Logo.svg" alt="side-logo" class="side-logo">
                    <button class="hidden" id="login">Masuk</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="asset/Side Logo.svg" alt="side-logo" class="side-logo">
                    <button class="hidden" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
    });
    </script>
</body>

</html>