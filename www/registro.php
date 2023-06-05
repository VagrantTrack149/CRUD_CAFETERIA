<?php include 'Model/conexion.php'; ?>
<?php 
    if(isset($_POST['Registrar_empleado'])){
        $nombre=$_POST['Nombre'];
        $apellido_paterno=$_POST['Paterno'];
        $apellido_materno=$_POST['Materno'];
        $puesto=$_POST['Puesto'];
        $salario=$_POST['Salario'];
        $tipo_persona=$_POST['Genero'];
        $telefono=$_POST['Telefono'];
        $dirr=$_POST['direccion'];
        $cp=$_POST['CP'];        

        
       $query= "CALL AgregarEmpleado('$nombre', '$apellido_paterno', '$apellido_materno', '$puesto', $salario, '$tipo_persona', '$telefono', '$dirr',$cp);";
        $result= mysqli_query($conn, $query);
        if (!$result) {
            $_SESSION['Message'] ='Usuario no registrado';
            $_SESSION['Message_type'] ='danger';
            header("location: index6.php");
        }else{
        $_SESSION['Message'] ='Usuario registrado con Exito';
        $_SESSION['Message_type'] ='success';
        header("location: index6.php");
        }
    }
?>