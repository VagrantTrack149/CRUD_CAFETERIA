<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "CALL BorrarProveedor ($id)";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='Proveedor NO eliminado';
            $_SESSION['Message_type'] ='warning';
            header("location: index3.php");
        }else{
        $_SESSION['Message'] ='Proveedor eliminado con Exito';
        $_SESSION['Message_type'] ='danger';
        header("location: index3.php");}
    }
?>
