<?php
session_start();
require_once "./edit.php";
$conn = new Query();
$conn ->editData($_SESSION['name']);
?>

