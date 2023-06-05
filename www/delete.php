<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "DELETE FROM Productos where idProducto =$id";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='Producto No eliminado';
            $_SESSION['Message_type'] ='danger';
            header("location:index.php");
        }else{
        $_SESSION['Message'] ='Producto eliminado con Exito';
        $_SESSION['Message_type'] ='danger';
        header("location: index.php");}
    }
?>
