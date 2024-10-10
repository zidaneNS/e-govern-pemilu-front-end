<?php

require_once('function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];

    $ch = ch('profil_pemerintah/' . $id);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id' => $id]));

    ch_redirect($ch, 'profil_pemerintah.php', 200);
}