<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light animate__animated animate__fadeIn">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="Notion_App_Logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
      <span class="fw-bold">Notiontapiboong</span>
      </style>
      <a class="nav-link fw-bold" href="register.php">Register</a>
    </a>
  </div>
</nav>  
<div class="container min-vh-100 d-flex justify-content-center align-items-center animate__animated animate__fadeIn">
<form action="login_process.php" method="post">
  <h1 class="text-center fw-bold animate__animated animate__pulse">Log In</h1>
  <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<div class="alert alert-danger" role="alert">Username atau password salah!</div>';
    }
    ?>
  <div class="mb-2 fw-bold">
    <label for="InputUsername" class="form-label">Username</label>
    <input type="text" class="form-control" name="username">
    <div id="inputUser" class="form-text">Masukkan username anda!</div>
  </div>
  <div class="mb-3 fw-bold">
    <label for="InputPassword" class="form-label">Password</label>
    <input type="password" class="form-control" name="password">
    <div data-aos="fade-right" id="inputUser" class="form-text">Masukkan password anda!</div>
  </div>
  <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
</form>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>
