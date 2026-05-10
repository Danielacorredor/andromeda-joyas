<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $tipo = $_POST['tipo'];
    $cantidad = $_POST['cantidad'];
    $responsable = $_POST['responsable'];
    $fecha = $_POST['fecha'];
    $nota = $_POST['nota'];

    
    $producto = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM productos WHERE id = $producto_id"));
    $stock_anterior = $producto['stock'];

    
    if ($tipo == 'Entrada' || $tipo == 'Devolución') {
        $stock_nuevo = $stock_anterior + $cantidad;
    } elseif ($tipo == 'Salida por venta') {
        $stock_nuevo = $stock_anterior - $cantidad;
    } else {
        
        $stock_nuevo = $cantidad;
    }

    
    $consulta = "INSERT INTO movimientos (producto_id, tipo, cantidad, stock_anterior, stock_nuevo, responsable, fecha, nota) 
                 VALUES ('$producto_id', '$tipo', '$cantidad', '$stock_anterior', '$stock_nuevo', '$responsable', '$fecha', '$nota')";

    if (mysqli_query($conexion, $consulta)) {
        // Actualizar stock del producto
        mysqli_query($conexion, "UPDATE productos SET stock = $stock_nuevo WHERE id = $producto_id");

        header('Location: movimientos.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>