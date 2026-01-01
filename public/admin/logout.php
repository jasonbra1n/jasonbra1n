<?php
require_once '../src/bootstrap.php';

$session = new Session();
$session->logout();

header("Location: login.php");
exit;
?>