<?php
session_start();
if (!isset ($_POST['exit'])) {
    header("location: ../authorization.php");
    exit;
}
unset($_SESSION['admin']);
header("location: ../authorization.php");
exit;
?>