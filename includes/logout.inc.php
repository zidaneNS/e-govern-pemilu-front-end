<?php 
include 'config_session.inc.php';

session_unset();
session_destroy();

header('Location: ../views/login_page.php');
exit();