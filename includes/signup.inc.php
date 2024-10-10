<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $password_raw = $_POST['password'];

    try {
        require_once('function_api.php');

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}