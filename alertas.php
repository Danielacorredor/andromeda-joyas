<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alertas — Andromeda Joyas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<body>
  <?php
include 'conexion.php';

// Sin stock
$sin_stock = mysqli_query($conexion, "SELECT * FROM productos WHERE stock = 0");
$total_sin_stock = mysqli_num_rows($sin_stock);

// Stock bajo
$stock_bajo = mysqli_query($conexion, "SELECT * FROM productos WHERE stock > 0 AND stock <= 5");
$total_stock_bajo = mysqli_num_rows($stock_bajo);

// Sin movimiento (más de 15 días)
$sin_movimiento = mysqli_query($conexion, "SELECT p.* FROM productos p 
    LEFT JOIN movimientos m ON p.id = m.producto_id 
    WHERE m.fecha < DATE_SUB(CURDATE(), INTERVAL 15 DAY) 
    OR m.fecha IS NULL
    GROUP BY p.id");
$total_sin_movimiento = mysqli_num_rows($sin_movimiento);
?>

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
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
      <span>Sistema</span>
      <span style="color:var(--border)">›</span>
      <strong>Alertas</strong>
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

    <h1 class="page-title">Centro de <span>Alertas</span></h1>

    
    <section aria-label="Resumen de alertas">
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-icon icon-rojo">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
          </div>
          <div class="stat-info">
            <label>Sin stock</label>
            <strong><?php echo $total_sin_stock; ?></strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon icon-naranja">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          </div>
          <div class="stat-info">
            <label>Stock bajo</label>
            <strong><?php echo $total_stock_bajo; ?></strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon icon-azul">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div class="stat-info">
            <label>Sin movimiento</label>
            <strong><?php echo $total_sin_movimiento; ?></strong>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon icon-rose">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>
          </div>
          <div class="stat-info">
            <label>Ventas inusuales</label>
            <strong>1</strong>
          </div>
        </div>
      </div>
    </section>

    
    <div class="alertas-grid">

      
      <section class="card" aria-labelledby="sinstock-title">
        <div class="card-header">
          <span class="header-dot dot-rojo" aria-hidden="true"></span>
          <h3 id="sinstock-title">Sin stock</h3>
          <span class="count-badge badge-rojo">1 producto</span>
        </div>
        <div class="alerta-item" role="alert">
          <img src="images/pulsera_plata.jpeg" alt="Pulsera de Plata 925" class="product-thumb">
          <div class="alerta-info">
            <div class="alerta-nombre">Pulsera de Plata 925</div>
            <div class="alerta-desc">Agotado desde 10/03/2026</div>
          </div>
          <div class="alerta-valor valor-rojo">0 uds.</div>
        </div>
      </section>

      
      <section class="card" aria-labelledby="stockbajo-title">
        <div class="card-header">
          <span class="header-dot dot-naranja" aria-hidden="true"></span>
          <h3 id="stockbajo-title">Stock bajo</h3>
          <span class="count-badge badge-naranja">2 productos</span>
        </div>
        <div class="alerta-item" role="alert">
          <img src="images/collar_corazon.jpeg" alt="Collar Corazón Rodio" class="product-thumb">
          <div class="alerta-info">
            <div class="alerta-nombre">Collar Corazón Rodio</div>
            <div class="alerta-desc">Mínimo recomendado: 5 uds.</div>
          </div>
          <div class="alerta-valor valor-naranja">3 uds.</div>
        </div>
        <div class="alerta-item" role="alert">
          <img src="images/cadena_osito.jpeg" alt="Cadena de Osito" class="product-thumb">
          <div class="alerta-info">
            <div class="alerta-nombre">Cadena de Osito</div>
            <div class="alerta-desc">Mínimo recomendado: 5 uds.</div>
          </div>
          <div class="alerta-valor valor-naranja">4 uds.</div>
        </div>
      </section>

    </div>

    
    <div class="alertas-grid">

      
      <section class="card" aria-labelledby="sinmov-title">
        <div class="card-header">
          <span class="header-dot dot-azul" aria-hidden="true"></span>
          <h3 id="sinmov-title">Sin movimiento reciente</h3>
          <span class="count-badge badge-azul">1 producto</span>
        </div>
        <div class="alerta-item">
          <img src="images/cadena_osito.jpeg" alt="Cadena de Osito" class="product-thumb">
          <div class="alerta-info">
            <div class="alerta-nombre">Cadena de Osito</div>
            <div class="alerta-desc">Último movimiento: 25/02/2026</div>
          </div>
          <div class="alerta-valor valor-azul">
            <span class="dias-badge">20 días</span>
          </div>
        </div>
      </section>

      
      <section class="card" aria-labelledby="inusual-title">
        <div class="card-header">
          <span class="header-dot dot-rose" aria-hidden="true"></span>
          <h3 id="inusual-title">Ventas inusuales</h3>
          <span class="count-badge badge-rose">1 producto</span>
        </div>
        <div class="alerta-item">
          <img src="images/collar_corazon.jpeg" alt="Collar Corazón Rodio" class="product-thumb">
          <div class="alerta-info">
            <div class="alerta-nombre">Collar Corazón Rodio</div>
            <div class="alerta-desc">Pico de ventas: 22 uds. en 1 semana</div>
          </div>
          <div class="alerta-valor valor-rose">+180%</div>
        </div>
      </section>

    </div>

    
    <section class="card card-full" aria-labelledby="resumen-title">
      <div class="card-header">
        <h3 id="resumen-title">Resumen general de alertas</h3>
      </div>
      <table>
        <thead>
          <tr>
            <th scope="col">Producto</th>
            <th scope="col">Tipo de alerta</th>
            <th scope="col">Stock actual</th>
            <th scope="col">Detalle</th>
            <th scope="col">Fecha</th>
            <th scope="col"><span class="sr-only">Acción</span></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="product-cell">
                <img src="images/pulsera_plata.jpeg" alt="Pulsera de Plata 925" class="product-thumb">
                <div>
                  <div class="product-name">Pulsera de Plata 925</div>
                  <div class="product-sub">Ref. #001</div>
                </div>
              </div>
            </td>
            <td><span class="stock-badge stock-out">Sin stock</span></td>
            <td style="color:#c0392b;font-weight:500">0</td>
            <td style="color:var(--text-muted);font-size:0.83rem">Agotado, requiere reposición urgente</td>
            <td style="color:var(--text-muted);font-size:0.8rem">10/03/2026</td>
            <td><a href="productos.php" class="btn-ver">Ver producto</a></td>
          </tr>
          <tr>
            <td>
              <div class="product-cell">
                <img src="images/collar_corazon.jpeg" alt="Collar Corazón Rodio" class="product-thumb">
                <div>
                  <div class="product-name">Collar Corazón Rodio</div>
                  <div class="product-sub">Ref. #002</div>
                </div>
              </div>
            </td>
            <td><span class="stock-badge stock-low">Stock bajo</span></td>
            <td style="color:#c07a00;font-weight:500">3</td>
            <td style="color:var(--text-muted);font-size:0.83rem">Por debajo del mínimo recomendado (5)</td>
            <td style="color:var(--text-muted);font-size:0.8rem">12/03/2026</td>
            <td><a href="productos.php" class="btn-ver">Ver producto</a></td>
          </tr>
          <tr>
            <td>
              <div class="product-cell">
                <img src="images/cadena_osito.jpeg" alt="Cadena de Osito" class="product-thumb">
                <div>
                  <div class="product-name">Cadena de Osito</div>
                  <div class="product-sub">Ref. #003</div>
                </div>
              </div>
            </td>
            <td><span class="stock-badge stock-low">Stock bajo</span></td>
            <td style="color:#c07a00;font-weight:500">4</td>
            <td style="color:var(--text-muted);font-size:0.83rem">Por debajo del mínimo recomendado (5)</td>
            <td style="color:var(--text-muted);font-size:0.8rem">14/03/2026</td>
            <td><a href="productos.php" class="btn-ver">Ver producto</a></td>
          </tr>
          <tr>
            <td>
              <div class="product-cell">
                <img src="images/cadena_osito.jpeg" alt="Cadena de Osito" class="product-thumb">
                <div>
                  <div class="product-name">Cadena de Osito</div>
                  <div class="product-sub">Ref. #003</div>
                </div>
              </div>
            </td>
            <td><span class="dias-badge">Sin movimiento</span></td>
            <td style="color:var(--text-muted);font-weight:500">19</td>
            <td style="color:var(--text-muted);font-size:0.83rem">Sin ventas ni entradas en 20 días</td>
            <td style="color:var(--text-muted);font-size:0.8rem">25/02/2026</td>
            <td><a href="movimientos.php" class="btn-ver">Ver historial</a></td>
          </tr>
          <tr>
            <td>
              <div class="product-cell">
                <img src="images/collar_corazon.jpeg" alt="Collar Corazón Rodio" class="product-thumb">
                <div>
                  <div class="product-name">Collar Corazón Rodio</div>
                  <div class="product-sub">Ref. #002</div>
                </div>
              </div>
            </td>
            <td><span class="stock-badge" style="background:var(--rose-pale);color:var(--rose-dark)">Venta inusual</span></td>
            <td style="color:var(--text-muted);font-weight:500">3</td>
            <td style="color:var(--text-muted);font-size:0.83rem">22 ventas en 1 semana, 180% sobre lo normal</td>
            <td style="color:var(--text-muted);font-size:0.8rem">10/03/2026</td>
            <td><a href="ventas.php" class="btn-ver">Ver ventas</a></td>
          </tr>
        </tbody>
      </table>
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