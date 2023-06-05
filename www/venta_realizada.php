<?php 
    include 'Model/conexion.php';
    if(isset($_POST['Numero_empleado'])){
        $id=$_POST['Numero_empleado'];
        $query = "CALL VENTA($id)";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='La venta NO se realizo';
            $_SESSION['Message_type'] ='danger';
            header("location: index4.php");
        }else{
        $_SESSION['Message'] ='Venta realizada con Exito';
        $_SESSION['Message_type'] ='success';
        header("location: index4.php");}
    }
?>
