<?php

require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];

    $ch = ch_img('partai/' . $id);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id' => $id]));

    ch_redirect($ch, '../views/partai.php', 200);
} else {
    header('../views/partai.php');
    exit;
}