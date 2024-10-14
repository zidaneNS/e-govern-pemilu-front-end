<!-- Sidebar -->
<div class="sidebar">
    <div class="profile">
        <div class="profile-icon">
            <img src="../asset/icon _user_.png" alt="Profile Icon" class="img-fluid rounded-circle" width="80">
        </div>
        <p><?= $_SESSION['nama']; ?></p>
        <p><?= $_SESSION['nip']; ?></p>
    </div>
    <ul class="menu">
        <?php if ($_SESSION['nip'] === '12345') {?>
        <li>
            <a href="http://localhost:5000/profil_pemerintah">
                <img src="../asset/Vector.png" alt="Icon" class="menu-icon me-2"> Pemerintah
            </a>
        </li>
        <?php } ?>
        <li>
            <a href="http://localhost:5000/partai">
                <img src="../asset/Vector.png" alt="Icon" class="menu-icon me-2"> Partai
            </a>
        </li>
        <li>
            <a href="http://localhost:5000/caleg">
                <img src="../asset/Vector.png" alt="Icon" class="menu-icon me-2"> Caleg
            </a>
        </li>
        <li>
            <a href="http://localhost:5000/profil_panitia">
                <img src="../asset/Vector.png" alt="Icon" class="menu-icon me-2"> Panitia TPS
            </a>
        </li>
    </ul>

    <div class="logout">
        <a href="http://localhost:5000/logout" class="d-flex align-items-center">
            <img src="../asset/Subtract.svg" alt="Logout Icon" class="logout-icon me-2">Log Out
        </a>
    </div>

    <div class="logo">
        <img src="../asset/Logo Side Bar.svg" alt="Logo-side-bar" class="img-fluid">
    </div>
</div>