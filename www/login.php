<?php
    include 'Model/conexion.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query= "SELECT * from Usuarios where usuario='$username' AND contraseña='$password'";
    $result= mysqli_query($conn,$query);
    if ($result->num_rows > 0) {
        $_SESSION['Message'] ='Inicio correcto';
        $_SESSION['Message_type'] ='success';
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    }else{
        $_SESSION['Message'] ='Credenciales incorrectas';
        $_SESSION['Message_type'] ='danger';
        header("location: index1.php");
        exit();
    }
?>
