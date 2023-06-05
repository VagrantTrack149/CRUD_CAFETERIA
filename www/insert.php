<?php include 'Model/conexion.php'; ?>
<?php 
    if(isset($_POST['Guardar'])){
        $producto=$_POST['Producto'];
        $cantidad=$_POST['Cantidad'];
        $precio =$_POST['Precio'];
        $query= "CALL AgregarProductoInventario('$producto',$precio,$cantidad);";
        #$query = "INSERT INTO Productos (Producto, Cantidad, Precio) value ('$producto', $cantidad, $precio)";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='Producto no insertado';
            $_SESSION['Message_type'] ='danger';
            header("location: index.php");
        }else{
        $_SESSION['Message'] ='Producto insertado con Exito';
        $_SESSION['Message_type'] ='success';
        header("location: index.php");
        }
    }
?>