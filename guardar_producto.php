<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha'];

    
    $imagen = '';
    if ($_FILES['imagen']['name'] != '') {
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta = 'images/' . $nombre_imagen;
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        $imagen = $ruta;
    }

    $consulta = "INSERT INTO productos (nombre, precio, stock, categoria, imagen, fecha_publicado) 
                 VALUES ('$nombre', '$precio', '$stock', '$categoria', '$imagen', '$fecha')";

    if (mysqli_query($conexion, $consulta)) {
        
        $producto_id = mysqli_insert_id($conexion);
        $movimiento = "INSERT INTO movimientos (producto_id, tipo, cantidad, stock_anterior, stock_nuevo, responsable, fecha, nota) 
                       VALUES ('$producto_id', 'Entrada', '$stock', '0', '$stock', 'Admin', '$fecha', 'Producto nuevo agregado')";
        mysqli_query($conexion, $movimiento);

        header('Location: productos.php');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>