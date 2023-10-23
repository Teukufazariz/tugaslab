<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
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
      <a class="nav-link fw-bold" href="login.php">Log In</a>
    </a>
  </div>
</nav>
<div class="container min-vh-100 d-flex justify-content-center align-items-center animate__animated animate__fadeIn">
  <form action="register_process.php" class="w-75" method="post">
  <h1 class="text-center fw-bold animate__animated animate__pulse">Register</h1>
  <div class="mb-2 fw-bold">
    <label for="namadepan" class="form-label">Nama Depan</label>
    <input type="text" class="form-control" name="namadepan" placeholder="Nama depan">
  </div>
  <div class="mb-2 fw-bold">
  <label for="namabelakang" class="form-label">Nama Belakang</label>
    <input type="text" class="form-control" name="namabelakang" placeholder="Nama belakang">
  </div>
  <div class="mb-2 fw-bold">
  <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="mb-2 fw-bold">
  <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <div class="mb-2 fw-bold">
  <label for="tanggal" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal lahir">
  </div>
  <div class="mb-2 fw-bold">
  <label for="gender" class="form-label">Gender</label>
    <select class="form-control" name="gender">
      <option value="lakilaki">Laki-laki</option>
      <option value="perempuan">Perempuan</option>
    </select>
  </div>
  <div class="d-flex justify-content-center">
    <button type="submit" name="register" class="btn btn-primary w-50" value="Register">Register</button>
  </div>
  </form>
</div>
</body>
</html>