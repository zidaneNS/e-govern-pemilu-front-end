<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-container {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 300px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-top: 10px;
        text-align: left;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .submit-btn {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 15px;
    }

    .submit-btn:hover {
        background-color: #45a049;
    }

    .toggle-btn {
        margin-top: 10px;
        color: #0066cc;
        cursor: pointer;
    }

    .toggle-btn:hover {
        text-decoration: underline;
    }
    </style>
    <script>
    function toggleForm() {
        const loginForm = document.getElementById('login-form');
        const signupForm = document.getElementById('signup-form');
        if (loginForm.style.display === 'none') {
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
        } else {
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
        }
    }
    </script>
</head>

<body>
    <div class="form-container">
        <!-- Login Form -->
        <div id="login-form">
            <h2>Login</h2>
            <form method="POST" action="login.inc.php">
                <label for="nip-login">NIP:</label>
                <input type="text" name="nip" id="nip-login" required>
                <label for="password-login">Password:</label>
                <input type="password" name="password" id="password-login" required>
                <input type="submit" class="submit-btn" value="Login">
            </form>
            <p class="toggle-btn" onclick="toggleForm()">Belum punya akun? Daftar di sini</p>
        </div>

        <!-- Signup Form -->
        <div id="signup-form" style="display: none;">
            <h2>Signup</h2>
            <form method="POST" action="signup.inc.php">
                <label for="nip-signup">NIP:</label>
                <input type="text" name="nip" id="nip-signup" required>
                <label for="nama-signup">Nama:</label>
                <input type="text" name="nama" id="nama-signup" required>
                <label for="password-signup">Password:</label>
                <input type="password" name="password" id="password-signup" required>
                <input type="submit" class="submit-btn" value="Signup">
            </form>
            <p class="toggle-btn" onclick="toggleForm()">Sudah punya akun? Login di sini</p>
        </div>
    </div>
</body>

</html>