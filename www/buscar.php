<?php
include 'Model/conexion.php';

if (isset($_GET['termino'])) {
    $termino = $_GET['termino'];
    $query = "SELECT idProducto, nombreProducto, precio, cantidad FROM Productos WHERE nombreProducto LIKE '%$termino%'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        session_start();
        $_SESSION['Message'] = 'No se encontraron coincidencias';
        $_SESSION['Message_type'] = 'warning';
    } else {
        header("Location: index4.php?termino=$termino");
        exit();
    }
} else {
    header("Location: index4.php");
    exit();
}
?>
