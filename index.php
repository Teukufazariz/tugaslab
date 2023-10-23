<?php
session_start();
// Cek apakah user sudah login
if (isset($_SESSION['user'])) {
  // User sudah login
  $username = $_SESSION['user']['username'];
  $id = $_SESSION['user']['id'];

  // Tampilkan task user
  $q_select = "select * from tasks where userid = $id";
  $run_q_select = mysqli_query($conn, $q_select);
  // ...
} else {
  // User belum login
  // ...
}
?>
<?php
session_start();
include 'database.php';

// Proses insert data
if (isset($_POST['add'])) {
    $task_label = $_POST['task'];
    $task_desc = $_POST['task_desc'];
    $task_deadline = $_POST['task_deadline'];

    // Ubah format tanggal ke dalam format yang sesuai (Y-m-d H:i:s)
    $task_deadline = date('Y-m-d H:i:s', strtotime($task_deadline));

    $q_insert = "INSERT INTO tasks (tasklabel, task_desc, task_deadline, taskstatus) VALUES ('$task_label', '$task_desc', '$task_deadline', 'open')";
    $run_q_insert = mysqli_query($conn, $q_insert);

    if ($run_q_insert) {
        header('Refresh:0; url=index.php');
    }
}

// Proses show data
$q_select = "SELECT * FROM tasks ORDER BY taskid DESC";
$run_q_select = mysqli_query($conn, $q_select);

// Proses delete data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $q_delete = "DELETE FROM tasks WHERE taskid = $id";
    $run_q_delete = mysqli_query($conn, $q_delete);

    if ($run_q_delete) {
        // Task telah berhasil dihapus
        header('Refresh:0; url=index.php');
    } else {
        // Terjadi kesalahan saat menghapus task
    }
}

// Proses update data (close or open)
if (isset($_GET['done'])) {
    $status = 'close';

    if ($_GET['status'] == 'open') {
        $status = 'close';
    } else {
        $status = 'open';
    }

    $q_update = "UPDATE tasks SET taskstatus = '$status' WHERE taskid = '" . $_GET['done'] . "'";
    $run_q_update = mysqli_query($conn, $q_update);

    header('Refresh:0; url=index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To Do List</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Notion_App_Logo.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
            <span class="fw-bold">Notiontapiboong</span>
            <a class="nav-link fw-bold" href="logout.php">Log Out</a>
        </a>
    </div>
</nav>
<br>
<div class="container">
    <div class="header">
      <div class="title text-center">
        <i class='bx bx-sun'></i>
        <span>To Do List</span>
      </div>
      <div class="description text-center">
        <?= date("l, d M Y") ?>
      </div>
    </div>
    <div class="content">
      <div class="container mb-3">
        <form action="" method="post">
          <input type="text" class="form-control mb-3 border-0" placeholder="Add task">
          <textarea name="task_desc" class="form-control mb-3 border-0" placeholder="Add task description"></textarea>
          <input type="datetime-local" name="task_deadline" class="form-control mb-3 border-0" placeholder="Add task deadline">
          <div class="text-right">
            <button type="submit" name="add" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>

      <?php
      if (mysqli_num_rows($run_q_select) > 0) {
        while ($r = mysqli_fetch_array($run_q_select)) {
          // Konversi data taskdeadline ke format yang sesuai
          $task_deadline = date('Y-m-d H:i', strtotime($r['task_deadline']));
          ?>
          <div class="container mb-3">
            <div class="task-item <?= $r['taskstatus'] == 'close' ? 'done' : '' ?>">
              <div>
                <input type="checkbox" onclick="window.location.href = '?done=<?= $r['taskid'] ?>&status=<?= $r['taskstatus'] ?>'" <?= $r['taskstatus'] == 'close' ? 'checked' : '' ?>>
                <span class="task-label"><?= $r['tasklabel'] ?></span>
                <span class="task-deadline"><?= $task_deadline ?></span>
                <div class="task-desc hidden">
                  <?= $r['task_desc'] ?>
                </div>
              </div>
              <div class="task-actions text-right">
                <a href="edit.php?id=<?= $r['taskid'] ?>" class="text-orange" title="Edit"><i class="bx bx-edit"></i></a>
                <a href="?delete=<?= $r['taskid'] ?>" class="text-red" title="Remove" onclick="return confirm('Hapus Task?')"><i class="bx bx-trash"></i></a>
              </div>
            </div>
          </div>
          <?php
        }
      } else {
        ?>
        <div class="alert alert-info text-center">Belum ada task</div>
        <?php
      }
      ?></div>
  </div>
</body>
</html>
