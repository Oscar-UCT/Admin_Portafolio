<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $_SESSION['user'] = $username;
    header("Location: index.php");
  } else {
    echo "Credenciales incorrectas.";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <title>Ingreso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-4">
  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm rounded">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Administración Portafolio</a>
        <span>Inicio de sesión</span>
      </div>
    </nav>
  </header>
  <form method="post" class="my-4 card p-5">
    <h2 class="mb-4">Ingresa tus datos</h2>
    <div class="mb-3">
      <label for="username" class="form-label">Nombre de usuario</label>
      <input type="text" name="username" class="form-control" placeholder="Usuario" required><br>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" name="password" class="form-control" placeholder="*********" required><br>
    </div>
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
  </form>
</body>

</html>