<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio — Inventario Joyas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
include 'conexion.php';


$total_productos = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM productos"))['total'];


$ventas_hoy = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM ventas WHERE fecha = CURDATE()"))['total'];


$stock_bajo = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT COUNT(*) as total FROM productos WHERE stock <= 5"))['total'];
?>


<aside class="sidebar" aria-label="Menú principal">
  <div class="logo">
    <img src="images/logo.png" alt="Logo Marca">
    <h2>Andromeda<br>Joyas</h2>
  </div>

  <nav aria-label="Navegación principal">
    <ul id="main-nav">
      <li class="active">
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
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="2"/><circle cx="19" cy="12" r="2"/><circle cx="5" cy="12" r="2"/></svg>
      <span>Sistema</span>
      <span style="color:var(--border)">›</span>
      <strong>Inventario</strong>
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

    <h1 class="page-title">Bienvenido, <span>Inventario de Joyas</span></h1>

    
    <section aria-label="Resumen del sistema">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
          </div>
          <div class="stat-info">
            <label>Productos</label>
            <strong><?php echo $total_productos; ?></strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          </div>
          <div class="stat-info">
            <label>Ventas hoy</label>
            <strong><?php echo $ventas_hoy; ?></strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          </div>
          <div class="stat-info">
            <label>Stock bajo</label>
            <strong style="color: var(--rose)"><?php echo $stock_bajo; ?></strong>
          </div>
        </div>
      </div>
    </section>

    
    <div class="two-col">
      
      <section class="card" aria-labelledby="ventas-title">
        <div class="card-header">
          <h3 id="ventas-title">Últimas ventas</h3>
          <a href="ventas.php" class="btn-sm" aria-label="Ver todas las ventas">Ver todas ›</a>
        </div>
        <table>
          <thead>
            <tr>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Stock</th>
              <th scope="col">Publicado</th>
              <th scope="col"><span class="sr-only">Acciones</span></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="product-cell">
                  <img src="images/pulsera_plata.jpeg" alt="Pulsera dePlata 925" class="product-thumb">
                  <div>
                    <div class="product-name">Pulsera de Plata 925</div>
                    <div class="product-sub">Laura Gómez</div>
                  </div>
                </div>
              </td>
              <td class="price">$55.000</td>
              <td><span class="stock-badge stock-low">5</span></td>
              <td style="color:var(--text-muted);font-size:0.8rem">20/02/2026</td>
              <td><button class="btn-edit" aria-label="Editar Pulsera de Plata 925">Editar</button></td>
            </tr>
            <tr>
              <td>
                <div class="product-cell">
                  <img src="images/collar_corazon.jpeg" alt="Collar Corazón Rodio" class="product-thumb">
                  <div>
                    <div class="product-name">Collar Corazón Rodio</div>
                    <div class="product-sub">Andre Ruiz</div>
                  </div>
                </div>
              </td>
              <td class="price">$22.000</td>
              <td><span class="stock-badge stock-low">5</span></td>
              <td style="color:var(--text-muted);font-size:0.8rem">15/02/2026</td>
              <td><button class="btn-edit" aria-label="Editar Collar Corazón Rodio">Editar</button></td>
            </tr>
            <tr>
              <td>
                <div class="product-cell">
                  <img src="images/cadena_osito.jpeg" alt="Cadena de Osito" class="product-thumb">
                  <div>
                    <div class="product-name">Cadena de Osito</div>
                    <div class="product-sub">Ana Martínez</div>
                  </div>
                </div>
              </td>
              <td class="price">$25.000</td>
              <td><span class="stock-badge stock-ok">12</span></td>
              <td style="color:var(--text-muted);font-size:0.8rem">01/03/2026</td>
              <td><button class="btn-edit" aria-label="Editar Cadena de Osito">Editar</button></td>
            </tr>
          </tbody>
        </table>
      </section>

      
      <section class="card alerts-panel" aria-labelledby="alertas-title">
        <div class="card-header">
          <h3 id="alertas-title">Alertas</h3>
          <svg viewBox="0 0 24 24" fill="none" stroke="var(--rose)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" width="18" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        </div>
        <p style="padding: 10px 1.25rem; font-size:0.8rem; color:var(--text-muted); border-bottom:1px solid var(--border)">Productos con poco stock:</p>
        <div class="alert-item" role="alert">
          <span class="alert-dot dot-red" aria-hidden="true"></span>
          <div>
            <strong>Pulsera de Plata 925</strong>
            <span>Quedan 2 unidades</span>
          </div>
        </div>
        <div class="alert-item" role="alert">
          <span class="alert-dot dot-orange" aria-hidden="true"></span>
          <div>
            <strong>Cadena de Osito</strong>
            <span>¡Queda 1 unidad!</span>
          </div>
        </div>
      </section>
    </div>

    
    <section aria-labelledby="productos-title">
      <div class="section-header">
        <h3 id="productos-title">Listado de Productos</h3>
        <button class="btn-primary" onclick="window.location.href='productos.php'">
  + Agregar producto
</button>
      </div>
      <div class="card">
        <table>
          <thead>
            <tr>
              <th scope="col">Imagen</th>
              <th scope="col">Nombre</th>
              <th scope="col">Precio</th>
              <th scope="col">Stock</th>
              <th scope="col">Publicado</th>
              <th scope="col">Ventas</th>
              <th scope="col"><span class="sr-only">Acciones</span></th>
            </tr>
          </thead>
         <?php
$consulta_ventas = "SELECT v.*, p.nombre, p.imagen, p.stock
                    FROM ventas v 
                    JOIN productos p ON v.producto_id = p.id
                    ORDER BY v.fecha DESC
                    LIMIT 3";
$resultado_ventas = mysqli_query($conexion, $consulta_ventas);

while ($venta = mysqli_fetch_assoc($resultado_ventas)) {
    echo "<tr>
        <td>
            <div class='product-cell'>
                <img src='" . $venta['imagen'] . "' alt='" . $venta['nombre'] . "' class='product-thumb'>
                <div>
                    <div class='product-name'>" . $venta['nombre'] . "</div>
                    <div class='product-sub'>" . $venta['cliente'] . "</div>
                </div>
            </div>
        </td>
        <td class='price'>$" . number_format($venta['precio_unitario'], 0, ',', '.') . "</td>
        <td><span class='stock-badge " . ($venta['stock'] == 0 ? 'stock-out' : ($venta['stock'] <= 5 ? 'stock-low' : 'stock-ok')) . "'>" . $venta['stock'] . "</span></td>
        <td style='color:var(--text-muted);font-size:0.8rem'>" . date('d/m/Y', strtotime($venta['fecha'])) . "</td>
        <td><button class='btn-edit'>Editar</button></td>
    </tr>";
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

</body>
</html>