<?php
session_id("admin123");
session_start();
session_destroy();
header("location:../homepage.html");
?>