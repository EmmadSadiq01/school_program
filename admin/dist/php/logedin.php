<?php

session_start();
if (!isset($_SESSION['logedin']) || $_SESSION['logedin'] != true) {
    header('location: /schoolManagementSystem/admin/dist/login.php');
    exit;
}
?>