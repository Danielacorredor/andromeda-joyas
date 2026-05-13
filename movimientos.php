<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Movimientos — Andromeda Joyas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --rose:       #c9706a;
      --rose-light: #e8a09b;
      --rose-pale:  #f5e6e4;
      --rose-bg:    #fdf5f4;
      --rose-dark:  #8b4a46;
      --text-main:  #2d1f1e;
      --text-muted: #8a6f6d;
      --border:     #ead8d6;
      --white:      #ffffff;
      --sidebar-w:  240px;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--rose-bg);
      color: var(--text-main);
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: var(--sidebar-w);
      background: var(--white);
      border-right: 1px solid var(--border);
      display: flex;
      flex-direction: column;
      padding: 2rem 0 1.5rem;
      position: fixed;
      top: 0; left: 0;
      height: 100vh;
      z-index: 100;
    }

    .logo {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
      padding: 0 1.5rem 2rem;
      border-bottom: 1px solid var(--border);
    }

    .logo img {
      width: 72px; height: 72px;
      object-fit: contain;
      border-radius: 50%;
      border: 1.5px solid var(--border);
      padding: 6px;
    }

    .logo h2 {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.05rem;
      font-weight: 600;
      color: var(--rose-dark);
      text-align: center;
      line-height: 1.3;
    }

    nav { padding: 1.5rem 0; flex: 1; }
    nav ul { list-style: none; }

    nav ul li a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 1.5rem;
      font-size: 0.875rem;
      font-weight: 400;
      color: var(--text-muted);
      text-decoration: none;
      border-left: 2.5px solid transparent;
      transition: all 0.18s ease;
    }

    nav ul li a svg { width: 16px; height: 16px; flex-shrink: 0; opacity: 0.7; }

    nav ul li a:hover {
      color: var(--rose);
      background: var(--rose-pale);
      border-left-color: var(--rose-light);
    }

    nav ul li.active a {
      color: var(--rose-dark);
      background: var(--rose-pale);
      border-left-color: var(--rose);
      font-weight: 500;
    }

    nav ul li.active a svg { opacity: 1; }

    .main {
      margin-left: var(--sidebar-w);
      flex: 1;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .topbar {
      background: var(--white);
      border-bottom: 1px solid var(--border);
      padding: 0 2rem;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 50;
    }

    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.85rem;
      color: var(--text-muted);
    }

    .breadcrumb svg { width: 16px; height: 16px; color: var(--rose); }
    .breadcrumb span { color: var(--text-muted); }
    .breadcrumb strong { color: var(--text-main); font-weight: 500; }

    .top-icons { display: flex; align-items: center; gap: 8px; }

    .top-icons button {
      width: 36px; height: 36px;
      border: 1px solid var(--border);
      border-radius: 8px;
      background: var(--white);
      color: var(--text-muted);
      cursor: pointer;
      display: flex; align-items: center; justify-content: center;
      transition: all 0.15s;
      position: relative;
    }

    .top-icons button:hover { background: var(--rose-pale); color: var(--rose); border-color: var(--rose-light); }
    .top-icons button svg { width: 16px; height: 16px; }

    .notif-dot {
      position: absolute;
      top: 6px; right: 7px;
      width: 7px; height: 7px;
      background: var(--rose);
      border-radius: 50%;
      border: 1.5px solid var(--white);
    }

    .content { padding: 2rem; }

    .page-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 1.7rem;
      font-weight: 600;
      color: var(--text-main);
      margin-bottom: 1.5rem;
    }

    .page-title span { color: var(--rose); }

    /* Stats */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 16px;
      margin-bottom: 1.75rem;
    }

    .stat-card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 14px;
      padding: 1.25rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: box-shadow 0.2s;
    }

    .stat-card:hover { box-shadow: 0 4px 16px rgba(180,100,95,0.08); }

    .stat-icon {
      width: 44px; height: 44px;
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }

    .stat-icon.entrada { background: #edf7ed; }
    .stat-icon.entrada svg { color: #3a7d44; }
    .stat-icon.salida  { background: #fdecea; }
    .stat-icon.salida svg  { color: #c0392b; }
    .stat-icon.correccion { background: #fff3e0; }
    .stat-icon.correccion svg { color: #c07a00; }
    .stat-icon.total { background: var(--rose-pale); }
    .stat-icon.total svg { color: var(--rose); }

    .stat-icon svg { width: 20px; height: 20px; }
    .stat-info label { font-size: 0.78rem; color: var(--text-muted); display: block; margin-bottom: 4px; }
    .stat-info strong { font-size: 1.4rem; font-weight: 500; color: var(--text-main); line-height: 1; }

    
    .filters {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 1rem;
      flex-wrap: wrap;
    }

    .search-box {
      display: flex;
      align-items: center;
      gap: 8px;
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 7px 14px;
      flex: 1;
      max-width: 300px;
    }

    .search-box svg { width: 15px; height: 15px; color: var(--text-muted); flex-shrink: 0; }

    .search-box input {
      border: none; outline: none;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.85rem;
      color: var(--text-main);
      background: transparent;
      width: 100%;
    }

    .search-box input::placeholder { color: var(--text-muted); }

    .filter-select {
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 7px 14px;
      font-family: 'DM Sans', sans-serif;
      font-size: 0.85rem;
      color: var(--text-muted);
      background: var(--white);
      cursor: pointer;
      outline: none;
    }

    
    .card {
      background: var(--white);
      border: 1px solid var(--border);
      border-radius: 14px;
      overflow: hidden;
    }

    .card-header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 1.25rem;
      border-bottom: 1px solid var(--border);
    }

    .card-header h3 { font-size: 0.95rem; font-weight: 500; }

    table { width: 100%; border-collapse: collapse; }

    thead th {
      padding: 10px 16px;
      font-size: 0.75rem;
      font-weight: 500;
      color: var(--text-muted);
      text-align: left;
      background: var(--rose-bg);
      border-bottom: 1px solid var(--border);
    }

    tbody tr { border-bottom: 1px solid var(--border); transition: background 0.12s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: var(--rose-bg); }

    tbody td {
      padding: 12px 16px;
      font-size: 0.85rem;
      color: var(--text-main);
      vertical-align: middle;
    }

    .product-cell { display: flex; align-items: center; gap: 10px; }

    .product-thumb {
      width: 40px; height: 40px;
      border-radius: 8px;
      object-fit: cover;
      border: 1px solid var(--border);
      background: var(--rose-pale);
    }

    .product-name { font-weight: 500; font-size: 0.85rem; }
    .product-sub  { font-size: 0.75rem; color: var(--text-muted); }

    /* Tipo de movimiento */
    .tipo-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      padding: 4px 10px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }

    .tipo-entrada    { background: #edf7ed; color: #3a7d44; }
    .tipo-salida     { background: #fdecea; color: #c0392b; }
    .tipo-correccion { background: #fff3e0; color: #c07a00; }
    .tipo-devolucion { background: #e8f0fe; color: #1a56db; }

    
    .cant-entrada { color: #3a7d44; font-weight: 500; }
    .cant-salida  { color: #c0392b; font-weight: 500; }
    .cant-neutral { color: var(--text-muted); font-weight: 500; }
  </style>
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
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
      <span>Sistema</span>
      <span style="color:var(--border)">›</span>
      <strong>Movimientos</strong>
    </div>
    <div class="top-icons">
      <button aria-label="Notificaciones (5 alertas pendientes)">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span class="notif-dot" aria-hidden="true"></span>
      </button>
      <div style="position:relative">
  <button aria-label="Menú de opciones" onclick="toggleMenu()" id="menuBtn">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
  </button>
  <div id="dropMenu" style="display:none; position:absolute; right:0; top:44px; background:var(--white); border:1px solid var(--border); border-radius:10px; box-shadow:0 4px 16px rgba(0,0,0,0.1); min-width:180px; z-index:200;">
    <div style="padding:10px 14px; border-bottom:1px solid var(--border); font-size:0.8rem; color:var(--text-muted);">
      <?php echo $_SESSION['usuario_nombre'] ?? 'Admin'; ?>
    </div>
    <a href="cambiar_password.php" style="display:flex; align-items:center; gap:8px; padding:10px 14px; font-size:0.85rem; color:var(--text-main); text-decoration:none;">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
      Cambiar contraseña
    </a>
    <a href="agregar_usuario.php" style="display:flex; align-items:center; gap:8px; padding:10px 14px; font-size:0.85rem; color:var(--text-main); text-decoration:none; border-top:1px solid var(--border);">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
      Agregar usuario
    </a>
    <a href="logout.php" style="display:flex; align-items:center; gap:8px; padding:10px 14px; font-size:0.85rem; color:#c0392b; text-decoration:none; border-top:1px solid var(--border);">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
      Cerrar sesión
    </a>
</div>
</div>
    </div>
  </header>

  <main class="content" id="main-content">

    <h1 class="page-title">Historial de <span>Movimientos</span></h1>

    <!-- Stats -->
    <section aria-label="Resumen de movimientos">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon total">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
          </div>
          <div class="stat-info">
            <label>Total movimientos</label>
            <strong>38</strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon entrada">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="17 11 12 6 7 11"/><line x1="12" y1="6" x2="12" y2="18"/></svg>
          </div>
          <div class="stat-info">
            <label>Entradas</label>
            <strong>15</strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon salida">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="7 13 12 18 17 13"/><line x1="12" y1="6" x2="12" y2="18"/></svg>
          </div>
          <div class="stat-info">
            <label>Salidas</label>
            <strong>20</strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon correccion">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          </div>
          <div class="stat-info">
            <label>Correcciones</label>
            <strong>3</strong>
          </div>
        </div>
      </div>
    </section>

    <div class="page-header">
  <h1 class="page-title">Historial de <span>Movimientos</span></h1>
  <button class="btn-primary" onclick="abrirModal()">
    + Registrar movimiento
  </button>
</div>

    
   <form method="GET" action="movimientos.php" class="filters">
  <div class="search-box">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    <input type="search" name="buscar" placeholder="Buscar por producto o responsable...">
  </div>
  <select class="filter-select" name="tipo" onchange="this.form.submit()">
    <option value="">Todos los tipos</option>
    <option>Entrada</option>
    <option>Salida por venta</option>
    <option>Corrección</option>
    <option>Devolución</option>
  </select>
  <button type="submit" class="btn-primary">Buscar</button>
</form>

    
    <section aria-labelledby="movimientos-title">
      <div class="card">
        <div class="card-header">
          <h3 id="movimientos-title">Historial — Marzo 2026</h3>
        </div>
        <table>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Producto</th>
              <th scope="col">Tipo</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Stock anterior</th>
              <th scope="col">Stock nuevo</th>
              <th scope="col">Responsable</th>
              <th scope="col">Fecha</th>
              <th scope="col">Nota</th>
            </tr>
          </thead>
         <?php

include 'conexion.php';

// Filtros
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$tipo_filtro = isset($_GET['tipo']) ? $_GET['tipo'] : '';

$donde = "WHERE 1=1";

if ($buscar != '') {
    $donde .= " AND (p.nombre LIKE '%$buscar%' OR m.responsable LIKE '%$buscar%')";
}

if ($tipo_filtro != '') {
    $donde .= " AND m.tipo = '$tipo_filtro'";
}

$consulta = "SELECT m.*, p.nombre, p.imagen 
             FROM movimientos m 
             JOIN productos p ON m.producto_id = p.id
             $donde
             ORDER BY m.fecha DESC";
$resultado = mysqli_query($conexion, $consulta);

$contador = 1;
while ($movimiento = mysqli_fetch_assoc($resultado)) {
    $tipo_clase = '';
    $cant_clase = '';
    $signo = '';

    if ($movimiento['tipo'] == 'Entrada') {
        $tipo_clase = 'tipo-entrada';
        $cant_clase = 'cant-entrada';
        $signo = '+';
    } elseif ($movimiento['tipo'] == 'Salida por venta') {
        $tipo_clase = 'tipo-salida';
        $cant_clase = 'cant-salida';
        $signo = '-';
    } elseif ($movimiento['tipo'] == 'Corrección') {
        $tipo_clase = 'tipo-correccion';
        $cant_clase = 'cant-neutral';
        $signo = '';
    } else {
        $tipo_clase = 'tipo-devolucion';
        $cant_clase = 'cant-entrada';
        $signo = '+';
    }

    echo "<tr>
        <td style='color:var(--text-muted);font-size:0.8rem'>" . str_pad($contador, 3, '0', STR_PAD_LEFT) . "</td>
        <td>
            <div class='product-cell'>
                <img src='" . $movimiento['imagen'] . "' alt='" . $movimiento['nombre'] . "' class='product-thumb'>
                <div class='product-name'>" . $movimiento['nombre'] . "</div>
            </div>
        </td>
        <td><span class='tipo-badge " . $tipo_clase . "'>" . $movimiento['tipo'] . "</span></td>
        <td class='" . $cant_clase . "'>" . $signo . $movimiento['cantidad'] . "</td>
        <td style='color:var(--text-muted)'>" . $movimiento['stock_anterior'] . "</td>
        <td style='font-weight:500'>" . $movimiento['stock_nuevo'] . "</td>
        <td>
            <div class='product-name'>" . $movimiento['responsable'] . "</div>
        </td>
        <td style='color:var(--text-muted);font-size:0.8rem'>" . date('d/m/Y', strtotime($movimiento['fecha'])) . "</td>
        <td style='color:var(--text-muted);font-size:0.8rem'>" . $movimiento['nota'] . "</td>
        <td>
    <a href='eliminar_movimiento.php?id=" . $movimiento['id'] . "' class='btn-delete' onclick='return confirm(\"¿Estás segura de eliminar este movimiento?\")'>Eliminar</a>
</td>
    </tr>";
    $contador++;
}
?>
        </table>
      </div>
    </section>

  </main>
</div>

<script>
  (function() {
    const current = window.location.pathname.split('/').pop() || 'index.php';
    document.querySelectorAll('#main-nav li').forEach(li => {
      const href = li.querySelector('a')?.getAttribute('href');
      li.classList.toggle('active', href === current);
    });
  })();
</script>

<div class="modal-overlay" id="modal" role="dialog" aria-modal="true">
  <div class="modal">
    <h3>Registrar movimiento</h3>
    <form action="guardar_movimiento.php" method="POST">
      <div class="form-group">
        <label>Producto</label>
        <select name="producto_id" required>
          <option value="">Seleccionar producto</option>
          <?php
          $productos = mysqli_query($conexion, "SELECT * FROM productos");
          while ($p = mysqli_fetch_assoc($productos)) {
              echo "<option value='" . $p['id'] . "'>" . $p['nombre'] . " (Stock: " . $p['stock'] . ")</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label>Tipo</label>
        <select name="tipo" required>
          <option>Entrada</option>
          <option>Salida por venta</option>
          <option>Corrección</option>
          <option>Devolución</option>
        </select>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label>Cantidad</label>
          <input type="number" name="cantidad" min="1" value="1" required>
        </div>
        <div class="form-group">
          <label>Fecha</label>
          <input type="date" name="fecha" required>
        </div>
      </div>
      <div class="form-group">
        <label>Responsable</label>
        <input type="text" name="responsable" placeholder="Nombre del responsable">
      </div>
      <div class="form-group">
        <label>Nota</label>
        <input type="text" name="nota" placeholder="Ej: Mercancía nueva, ajuste de inventario...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn-cancel" onclick="cerrarModal()">Cancelar</button>
        <button type="submit" class="btn-primary">Guardar movimiento</button>
      </div>
    </form>
  </div>
</div>

<script>
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

<script>
function toggleMenu() {
  const menu = document.getElementById('dropMenu');
  menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
}

document.addEventListener('click', function(e) {
  if (!document.getElementById('menuBtn').contains(e.target)) {
    document.getElementById('dropMenu').style.display = 'none';
  }
});
</script>
</body>
</html>