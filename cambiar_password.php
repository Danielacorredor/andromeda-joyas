<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$mensaje = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password_actual = $_POST['password_actual'];
    $password_nueva = $_POST['password_nueva'];
    $password_confirmar = $_POST['password_confirmar'];

    $usuario = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM usuarios WHERE id = " . $_SESSION['usuario_id']));

    if (!password_verify($password_actual, $usuario['password'])) {
        $error = 'La contraseña actual es incorrecta';
    } elseif ($password_nueva != $password_confirmar) {
        $error = 'Las contraseñas nuevas no coinciden';
    } elseif (strlen($password_nueva) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres';
    } else {
        $hash = password_hash($password_nueva, PASSWORD_DEFAULT);
        mysqli_query($conexion, "UPDATE usuarios SET password = '$hash' WHERE id = " . $_SESSION['usuario_id']);
        $mensaje = '¡Contraseña cambiada exitosamente!';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cambiar Contraseña — Andromeda Joyas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<aside class="sidebar" aria-label="Menú principal">
  <div class="logo">
    <img src="images/logo.png" alt="Logo Marca">
    <h2>Andromeda<br>Joyas</h2>
  </div>
  <nav aria-label="Navegación principal">
    <ul id="main-nav">
      <li><a href="index.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>Inicio</a></li>
      <li><a href="productos.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>Productos</a></li>
      <li><a href="ventas.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>Ventas</a></li>
      <li><a href="movimientos.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>Movimientos</a></li>
      <li><a href="alertas.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>Alertas</a></li>
    </ul>
  </nav>
</aside>

<div class="main">
  <header class="topbar" role="banner">
    <div class="breadcrumb">
      <span>Sistema</span>
      <span style="color:var(--border)">›</span>
      <strong>Cambiar contraseña</strong>
    </div>
  </header>

  <main class="content">
    <h1 class="page-title">Cambiar <span>Contraseña</span></h1>

    <?php if ($mensaje): ?>
    <div style="background:#edf7ed;border:1px solid #c3e6cb;color:#3a7d44;padding:12px 16px;border-radius:10px;margin-bottom:1.5rem;font-size:0.85rem;">
      <?php echo $mensaje; ?>
    </div>
    <?php endif; ?>

    <?php if ($error): ?>
    <div style="background:#fdecea;border:1px solid #f5c6c4;color:#c0392b;padding:12px 16px;border-radius:10px;margin-bottom:1.5rem;font-size:0.85rem;">
      <?php echo $error; ?>
    </div>
    <?php endif; ?>

    <div class="card" style="max-width:450px;padding:2rem;">
      <form method="POST" action="cambiar_password.php">
        <div class="form-group">
          <label>Contraseña actual</label>
          <input type="password" name="password_actual" required placeholder="••••••••">
        </div>
        <div class="form-group">
          <label>Contraseña nueva</label>
          <input type="password" name="password_nueva" required placeholder="••••••••">
        </div>
        <div class="form-group">
          <label>Confirmar contraseña nueva</label>
          <input type="password" name="password_confirmar" required placeholder="••••••••">
        </div>
        <div class="modal-footer" style="margin-top:1.5rem;">
          <a href="index.php" class="btn-cancel">Cancelar</a>
          <button type="submit" class="btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </main>
</div>

</body>
</html>