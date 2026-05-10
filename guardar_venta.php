<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['producto_id'];
    $cliente = $_POST['cliente'];
    $email = $_POST['email'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $fecha = $_POST['fecha'];

    
    $producto = mysqli_fetch_assoc(mysqli_query($conexion, "SELECT * FROM productos WHERE id = $producto_id"));
    $precio_unitario = $producto['precio'];
    $total = $precio_unitario * $cantidad;

    
    $consulta = "INSERT INTO ventas (producto_id, cliente, email, cantidad, precio_unitario, total, fecha, estado) 
                 VALUES ('$producto_id', '$cliente', '$email', '$cantidad', '$precio_unitario', '$total', '$fecha', '$estado')";
    
    if (mysqli_query($conexion, $consulta)) {
        // Actualizar stock del producto
        mysqli_query($conexion, "UPDATE productos SET stock = stock - $cantidad WHERE id = $producto_id");
        
        
        $stock_anterior = $producto['stock'];
        $stock_nuevo = $stock_anterior - $cantidad;
        mysqli_query($conexion, "INSERT INTO movimientos (producto_id, tipo, cantidad, stock_anterior, stock_nuevo, responsable, fecha, nota) 
                     VALUES ('$producto_id', 'Salida por venta', '$cantidad', '$stock_anterior', '$stock_nuevo', '$cliente', '$fecha', 'Venta registrada')");

        header('Location: ventas.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>