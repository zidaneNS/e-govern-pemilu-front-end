<?php

require_once('../includes/function_api.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST['id'];

    $ch = ch_img('caleg/' . $id);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['id' => $id]));

    ch_redirect($ch, '../views/caleg.php', 200);
} else {
    header('../views/caleg.php');
    exit;
}