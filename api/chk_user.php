<?php
include "../database/base.php";

session_start();

$acc = $_POST['acc'];
$pw = $_POST['pw'];

$sql = "SELECT count(`id`) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";
$chk = $pdo->query($sql)->fetchColumn();
if ($chk == 1) {
    $sql = "SELECT `id`,`acc`,`name`,`last_login`
          FROM `users`
          WHERE `acc` = '$acc' && `pw` = '$pw'";
    $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    $_SESSION['login'] = $user;
    header("location:../admin_center.php");
} else {
    if (isset($_SESSION['login_try'])) {
        $_SESSION['login_try']++;
    } else {
        $_SESSION['login_try'] = 1;
    }
    header("location:../login.php?error=login");
}