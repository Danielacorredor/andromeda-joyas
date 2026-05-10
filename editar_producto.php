<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $producto = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM productos WHERE id = $id"));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha'];

    $imagen = $_POST['imagen_actual'];
    if ($_FILES['imagen']['name'] != '') {
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta = 'images/' . $nombre_imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $imagen = $ruta;
    }

    $consulta = "UPDATE productos SET 
                nombre='$nombre', 
                precio='$precio', 
                stock='$stock', 
                categoria='$categoria', 
                imagen='$imagen',
                fecha_publicado='$fecha'
                WHERE id='$id'";

    if (mysqli_query($conexion, $consulta)) {
        header('Location: productos.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto — Andromeda Joyas</title>
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
      <li class="active"><a href="productos.php"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>Productos</a></li>
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
      <strong>Editar Producto</strong>
    </div>
  </header>

  <main class="content">
    <h1 class="page-title">Editar <span>Producto</span></h1>

    <div class="card" style="max-width: 500px; padding: 2rem;">
      <form action="editar_producto.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
        <input type="hidden" name="imagen_actual" value="<?php echo $producto['imagen']; ?>">

        <div class="form-group">
          <label>Nombre del producto</label>
          <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label>Precio ($)</label>
            <input type="number" name="precio" value="<?php echo $producto['precio']; ?>" required>
          </div>
          <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>
          </div>
        </div>

        <div class="form-group">
          <label>Categoría</label>
          <select name="categoria">
            <option <?php if($producto['categoria']=='Pulseras') echo 'selected'; ?>>Pulseras</option>
            <option <?php if($producto['categoria']=='Collares') echo 'selected'; ?>>Collares</option>
            <option <?php if($producto['categoria']=='Cadenas') echo 'selected'; ?>>Cadenas</option>
            <option <?php if($producto['categoria']=='Aretes') echo 'selected'; ?>>Aretes</option>
            <option <?php if($producto['categoria']=='Anillos') echo 'selected'; ?>>Anillos</option>
          </select>
        </div>

        <div class="form-group">
          <label>Fecha de publicación</label>
          <input type="date" name="fecha" value="<?php echo $producto['fecha_publicado']; ?>">
        </div>

        <div class="form-group">
          <label>Imagen actual</label>
          <img src="<?php echo $producto['imagen']; ?>" style="width:60px;height:60px;border-radius:8px;object-fit:cover;display:block;margin-bottom:8px;">
          <input type="file" name="imagen" accept="image/*">
        </div>

        <div class="modal-footer" style="margin-top:1.5rem;">
          <a href="productos.php" class="btn-cancel">Cancelar</a>
          <button type="submit" class="btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </main>
</div>

</body>
</html>