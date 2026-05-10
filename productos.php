<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos — Andromeda Joyas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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
      <li>
        <a href="index.php">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
          Inicio
        </a>
      </li>
      <li>
        <a href="productos.php">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
          Productos
        </a>
      </li>
      <li>
        <a href="ventas.php">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          Ventas
        </a>
      </li>
      <li>
        <a href="movimientos.php">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          Movimientos
        </a>
      </li>
      <li>
        <a href="alertas.php">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          Alertas
        </a>
      </li>
    </ul>
  </nav>
</aside>

<div class="main">

  <header class="topbar" role="banner">
    <div class="breadcrumb">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
      <span>Sistema</span>
      <span style="color:var(--border)">›</span>
      <strong>Productos</strong>
    </div>
    <div class="top-icons">
      <button aria-label="Notificaciones (5 alertas pendientes)">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span class="notif-dot" aria-hidden="true"></span>
      </button>
      <button aria-label="Menú de opciones">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
  </header>

  <main class="content" id="main-content">

    <div class="page-header">
      <h1 class="page-title">Gestión de <span>Productos</span></h1>
      <button class="btn-primary" onclick="abrirModal()" aria-label="Agregar nuevo producto">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Agregar producto
      </button>
    </div>

    
    <section aria-label="Resumen de productos">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
          </div>
          <div class="stat-info">
            <label>Total productos</label>
            <strong>20</strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          </div>
          <div class="stat-info">
            <label>En stock</label>
            <strong>15</strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          </div>
          <div class="stat-info">
            <label>Stock bajo</label>
            <strong style="color:var(--rose)">5</strong>
          </div>
        </div>
      </div>
    </section>

    
    <form method="GET" action="productos.php" class="filters">
  <div class="search-box">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    <input type="search" name="buscar" placeholder="Buscar producto...">
  </div>
  <select class="filter-select" name="categoria" onchange="this.form.submit()">
    <option value="">Todas las categorías</option>
    <option>Pulseras</option>
    <option>Collares</option>
    <option>Cadenas</option>
    <option>Aretes</option>
    <option>Anillos</option>
  </select>
  <select class="filter-select" name="stock" onchange="this.form.submit()">
    <option value="">Todo el stock</option>
    <option>Stock normal</option>
    <option>Stock bajo</option>
    <option>Sin stock</option>
  </select>
  <button type="submit" class="btn-primary">Buscar</button>
</form>

    
    <section aria-labelledby="productos-title">
      <div class="card">
        <table>
          <thead>
            <tr>
              <th scope="col">Producto</th>
              <th scope="col">Categoría</th>
              <th scope="col">Precio</th>
              <th scope="col">Stock</th>
              <th scope="col">Publicado</th>
              <th scope="col">Ventas</th>
              <th scope="col"><span class="sr-only">Acciones</span></th>
            </tr>
          </thead>
          <?php


include 'conexion.php';

// Filtros
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$stock_filtro = isset($_GET['stock']) ? $_GET['stock'] : '';

$donde = "WHERE 1=1";

if ($buscar != '') {
    $donde .= " AND nombre LIKE '%$buscar%'";
}

if ($categoria != '') {
    $donde .= " AND categoria = '$categoria'";
}

if ($stock_filtro == 'Stock normal') {
    $donde .= " AND stock > 5";
} elseif ($stock_filtro == 'Stock bajo') {
    $donde .= " AND stock > 0 AND stock <= 5";
} elseif ($stock_filtro == 'Sin stock') {
    $donde .= " AND stock = 0";
}

$consulta = "SELECT * FROM productos $donde";
$resultado = mysqli_query($conexion, $consulta);

while ($producto = mysqli_fetch_assoc($resultado)) {
    echo "<tr>
        <td>
            <div class='product-cell'>
                <img src='" . $producto['imagen'] . "' alt='" . $producto['nombre'] . "' class='product-thumb'>
                <div>
                    <div class='product-name'>" . $producto['nombre'] . "</div>
                    <div class='product-sub'>Ref. #" . str_pad($producto['id'], 3, '0', STR_PAD_LEFT) . "</div>
                </div>
            </div>
        </td>
        <td style='color:var(--text-muted);font-size:0.83rem'>" . $producto['categoria'] . "</td>
        <td class='price'>$" . number_format($producto['precio'], 0, ',', '.') . "</td>
        <td><span class='stock-badge " . ($producto['stock'] == 0 ? 'stock-out' : ($producto['stock'] <= 5 ? 'stock-low' : 'stock-ok')) . "'>" . $producto['stock'] . "</span></td>
        <td style='color:var(--text-muted);font-size:0.8rem'>" . date('d/m/Y', strtotime($producto['fecha_publicado'])) . "</td>
        <td>0</td>
        <td>
            <div class='action-icons'>
                <a href='editar_producto.php?id=" . $producto['id'] . "' class='btn-edit'>Editar</a>
                <a href='eliminar_producto.php?id=" . $producto['id'] . "' class='btn-delete' onclick='return confirm(\"¿Estás segura de eliminar este producto?\")'>Eliminar</a>
            </div>
        </td>
    </tr>";
}
?>
        </table>
      </div>
    </section>

  </main>
</div>


<div class="modal-overlay" id="modal" role="dialog" aria-modal="true" aria-labelledby="modal-title">
  <div class="modal">
  <h3 id="modal-title">Agregar producto</h3>
  <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nombre">Nombre del producto</label>
      <input type="text" id="nombre" placeholder="Ej: Pulsera de Plata 925">
    </div>
    <div class="form-row">
      <div class="form-group">
        <label for="precio">Precio ($)</label>
        <input type="number" id="precio" placeholder="0">
      </div>
      <div class="form-group">
        <label for="stock">Stock</label>
        <input type="number" id="stock" placeholder="0">
      </div>
    </div>
    <div class="form-group">
      <label for="categoria">Categoría</label>
      <select id="categoria">
        <option value="">Seleccionar categoría</option>
        <option>Pulseras</option>
        <option>Collares</option>
        <option>Cadenas</option>
        <option>Aretes</option>
        <option>Anillos</option>
      </select>
    </div>
    <div class="form-group">
      <label for="fecha">Fecha de publicación</label>
      <input type="date" id="fecha">
    </div>
    <div class="form-group">
      <label for="imagen">Imagen del producto</label>
      <input type="file" id="imagen" accept="image/*">
    </div>
    <div class="modal-footer">
      <button class="btn-cancel" onclick="cerrarModal()">Cancelar</button>
      <button type="submit" class="btn-primary">Guardar producto</button>
    </div>
    </div>
  </form>  ← aquí
</div>
  </div>
</div>

<script>
  (function() {
    const current = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('#main-nav li').forEach(li => {
      const href = li.querySelector('a')?.getAttribute('href');
      li.classList.toggle('active', href === current);
    });
  })();

  function abrirModal() {
    document.getElementById('modal').classList.add('open');
  }

  function cerrarModal() {
    document.getElementById('modal').classList.remove('open');
  }

  document.getElementById('modal').addEventListener('click', function(e) {
    if (e.target === this) cerrarModal();
  });
</script>

</body>
</html>