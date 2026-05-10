<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Primero eliminar movimientos relacionados
    mysqli_query($conexion, "DELETE FROM movimientos WHERE producto_id = $id");
    
    
    mysqli_query($conexion, "DELETE FROM ventas WHERE producto_id = $id");
    
    // Finalmente eliminar el producto
    mysqli_query($conexion, "DELETE FROM productos WHERE id = $id");
    
    header('Location: productos.php');
}
?>