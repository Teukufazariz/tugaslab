<?php

session_start();

// Hapus session user
session_unset();
session_destroy();

// Arahkan ke login page
header('Location: login.php');
exit();

?>