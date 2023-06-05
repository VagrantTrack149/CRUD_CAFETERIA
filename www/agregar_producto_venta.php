<?php 
include 'Model/conexion.php';

if(isset($_POST['cantidad_venta']) && isset($_POST['id'])){
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad_venta'];
    $query = "CALL InsertarDetalleVenta($id, $cantidad);";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        $_SESSION['Message'] ='Producto no insertado';
        $_SESSION['Message_type'] ='danger';
        header("location: index4.php");
    } else {
        $_SESSION['Message'] ='Producto insertado con Éxito';
        $_SESSION['Message_type'] ='success';
        header("location: index4.php");
    }
}
?>
