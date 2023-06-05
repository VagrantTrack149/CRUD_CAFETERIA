<?php include 'Model/conexion.php'; ?>
<?php 
    if(isset($_POST['Guardar_empleado'])){
        $nombre=$_POST['Nombre'];
        $apellido_paterno=$_POST['Paterno'];
        $apellido_materno=$_POST['Materno'];
        $tipo_persona=$_POST['Genero'];
        $telefono=$_POST['Telefono'];
        $dirr=$_POST['direccion'];
        $cp=$_POST['CP'];
        $empresa=$_POST['Empresa'];        

        
       $query= "CALL Agregarproveedor('$nombre', '$apellido_paterno', '$apellido_materno', '$tipo_persona', $telefono, '$dirr',$cp,'$empresa');";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='Proveedor no registrado';
            $_SESSION['Message_type'] ='danger';
            header("location: index3.php");
        }else{
        $_SESSION['Message'] ='Proveedor registrado con Exito';
        $_SESSION['Message_type'] ='success';
        header("location: index3.php");
        }
    }
?>