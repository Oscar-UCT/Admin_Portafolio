<?php
include 'auth.php';
include 'db.php';
$result = $conn->query("SELECT * FROM proyectos ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="../../assets/imgs/icon.png">
  <title>Portafolio Dinámico - Oscar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="./assets/css/main.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container py-4">
    <header>
      <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm rounded">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Administración Portafolio</a>
          <a href="add.php" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Proyecto</a>
          <a href="logout.php" class="btn btn-outline-danger">Cerrar sesión</a>
        </div>
      </nav>
    </header>
    <h2 class="my-4">Tus proyectos</h2>
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="card mb-3 shadow-sm">
          <div class="row g-0">
            <div class="col-md-3 d-flex align-items-center justify-content-center p-2">
              <img src="uploads/<?= $row['imagen'] ?>" class="img-fluid rounded" style="max-width: 150px;" alt="<?= $row['titulo'] ?>">
            </div>
            <div class="col-md-9">
              <div class="card-body">
                <h3 class="card-title"><?= $row['titulo'] ?></h3>
                <p class="card-text"><?= $row['descripcion'] ?></p>
                <a href="<?= $row['url_github'] ?>" class="btn btn-dark btn-sm me-2" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                <a href="<?= $row['url_produccion'] ?>" class="btn btn-primary btn-sm me-2" target="_blank"><i class="fa fa-link"></i> Enlace</a>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"></i> Editar</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')"><i class="fa fa-trash"></i> Eliminar</a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No se encontraron proyectos.</p>
    <?php endif; ?>

  </div>
</body>

</html>