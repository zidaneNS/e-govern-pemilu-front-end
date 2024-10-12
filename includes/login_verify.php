<?php
include 'config_session.inc.php';

if (!isset($_SESSION['nip'])) {
    header('Location: login_page.php');
    exit;
}