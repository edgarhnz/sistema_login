<?php
require_once 'includes/session.php';
Session::start();
Session::destroy();
header("Location: ../index.php");
exit;
?>
