<?php
 session_start();
 unset($_SESSION['name']);
 session_destroy();
 echo "<script>localstorage.clear();</script>";
 header("Location:../homepage.html");

?>