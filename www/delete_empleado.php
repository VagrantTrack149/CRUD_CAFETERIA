<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "CALL BorrarEmpleado ($id)";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='Empleado NO fue eliminado';
            $_SESSION['Message_type'] ='warning';
            header("location: index2.php");
        }else{
        $_SESSION['Message'] ='Empleado eliminado con Exito';
        $_SESSION['Message_type'] ='danger';
        header("location: index2.php");}
    }
?>
