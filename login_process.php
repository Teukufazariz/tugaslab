<?php

// Koneksi ke database
$db = new PDO('mysql:host=localhost;dbname=todolist', 'root', '');

// Fungsi untuk login user
function loginUser($db, $username, $password) {
  // Get user dari database
  $sql = 'SELECT * FROM datauser WHERE username = ?';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(1, $username);
  $stmt->execute();
  $user = $stmt->fetch();

  // Cek apakah user ada
  if (!$user) {
    return false;
  }

  // Cek apakah password benar
  if (!password_verify($password, $user['password'])) {
    return false;
  }

  // Set session user
  $_SESSION['user'] = $user;

  // Return true jika login berhasil
  return true;
}

// Proses login jika form login disubmit
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (loginUser($db, $username, $password)) {
    header('Location: index.php');
  } else {
    header('Location: login.php?error=1');
  }
}

?>