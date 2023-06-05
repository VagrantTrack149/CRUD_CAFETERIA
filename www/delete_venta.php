<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "DELETE FROM `DetallesVentas` WHERE idProducto=$id";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='El producto no se pudo eliminar';
            $_SESSION['Message_type'] ='warning';
            header("location: index4.php");
        }
        $_SESSION['Message'] ='Producto eliminado con Exito';
        $_SESSION['Message_type'] ='danger';
        header("location: index4.php");
    }
?>
