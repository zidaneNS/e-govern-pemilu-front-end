<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];

        $apiUrl = 'http://localhost:5000/kpu/' . $id;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['nip' => $nip, 'nama' => $nama]));
    }
}