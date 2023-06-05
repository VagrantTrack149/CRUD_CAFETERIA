<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT e.idProveedor, p.nombre, p.apellidoPaterno, p.apellidoMaterno, p.tipoPersona, e.nombreEmpresa,p.telefono,p.direccion, p.CP
        FROM Personas p
        INNER JOIN Proveedores e ON p.idPersona = e.idPersona
                  WHERE e.idProveedor = $id;";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) { 
            $row = mysqli_fetch_array($result);
            $nombre=$row['nombre'];
            $paterno=$row['apellidoPaterno'];
            $materno=$row['apellidoMaterno'];
            $tipo_persona=$row['tipoPersona'];
            $telefono=$row['telefono'];
            $dirr=$row['direccion'];
            $cp=$row['CP'];
            $empresa=$row['nombreEmpresa'];    
        }
        if (isset($_POST['Guardar_proveedor'])){
            $nombre=$_POST['Nombre'];
            $paterno=$_POST['Paterno'];
            $materno=$_POST['Materno'];
            $tipo_persona=$_POST['Genero'];
            $telefono=$_POST['Telefono'];
            $dirr=$_POST['direccion'];
            $cp=$_POST['CP'];
            $empresa=$_POST['Empresa'];  
            
            $query = "CALL ModificarProveedor($id, '$empresa', '$nombre', '$paterno', '$materno', '$tipo_persona', '$telefono', '$dirr', $cp)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['Message'] = 'Empleado editado con éxito';
                $_SESSION['Message_type'] = 'success';
            } else {
                $_SESSION['Message'] = 'Error al editar el empleado';
                $_SESSION['Message_type'] = 'danger';
            }
            header("location: index3.php");
            exit();
        }
    }
?>
<?php include 'Template/header.php'; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
<div class="card card-body">
    <form action="edit_proveedor.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <div class="form-group">
                        <input type="text" name="Nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre del empleado">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Paterno"value="<?php echo $paterno; ?>" class="form-control" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Materno" value="<?php echo $materno; ?>"class="form-control" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group">
                        <select name="Genero" class="form-control">
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Telefono"value="<?php echo $telefono; ?>" class="form-control" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" value="<?php echo $dirr; ?>"class="form-control" placeholder="Dirección">
                    </div>
                    <div class="form-group">
                        <input type="text" name="CP" value="<?php echo $cp; ?>"class="form-control" placeholder="Código Postal">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Empresa" value="<?php echo $empresa; ?>"class="form-control" placeholder="Empresa">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="Guardar_proveedor" value="Guardar Cambios">
    </form>
</div>
</div>
</div>
</div>
<?php include 'Template/footer.php'; ?>
