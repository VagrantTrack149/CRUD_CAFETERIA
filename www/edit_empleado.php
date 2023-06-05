<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT e.idPersona, e.idEmpleado, p.nombre, p.apellidoPaterno, p.apellidoMaterno, p.tipoPersona, e.puesto, e.salario, p.telefono, p.direccion, p.CP
                  FROM Personas p
                  INNER JOIN Empleados e ON p.idPersona = e.idPersona
                  WHERE e.idEmpleado = $id;";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) { 
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $apellido_paterno = $row['apellidoPaterno'];
            $apellido_materno = $row['apellidoMaterno'];
            $puesto = $row['puesto'];
            $salario = $row['salario'];
            $tipo_persona = $row['tipoPersona'];
            $telefono = $row['telefono'];
            $dirr = $row['direccion'];
            $cp = $row['CP'];   
        }
        if (isset($_POST['Guardar_empleado'])){
            $nombre = $_POST['Nombre'];
            $apellido_paterno = $_POST['Paterno'];
            $apellido_materno = $_POST['Materno'];
            $puesto = $_POST['Puesto'];
            $salario = $_POST['Salario'];
            $tipo_persona = $_POST['Genero'];
            $telefono = $_POST['telefono'];
            $dirr = $_POST['direccion'];
            $cp = $_POST['CP'];
            
            $query = "BEGIN TRANSACTION 
            BEGIN TRY
            CALL ModificarEmpleado($id, '$apellido_paterno', '$apellido_materno', '$tipo_persona', '$telefono', '$dirr', $cp, '$puesto', $salario)
            COMMIT TRANSACTION
            END TRY
            BEGIN CATCH ROLLBACK TRANSACTION";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['Message'] = 'Empleado editado con éxito';
                $_SESSION['Message_type'] = 'success';
            } else {
                $_SESSION['Message'] = 'Error al editar el empleado';
                $_SESSION['Message_type'] = 'danger';
            }
            header("location: index2.php");
            exit();
        }
    }
?>
<?php include 'Template/header.php'; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
<div class="card card-body">
    <form action="edit_empleado.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
            <input type="text" name="Nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Nombre del empleado">
        </div>
        <div class="form-group">
            <input type="text" name="Paterno" value="<?php echo $apellido_paterno; ?>" class="form-control" placeholder="Apellido Paterno">
        </div>
        <div class="form-group">
            <input type="text" name="Materno" value="<?php echo $apellido_materno; ?>" class="form-control" placeholder="Apellido Materno">
        </div>
        <div class="form-group">
            <input type="text" name="Puesto" value="<?php echo $puesto; ?>" class="form-control" placeholder="Puesto">
        </div>
        <div class="form-group">
            <input type="text" name="Salario" value="<?php echo $salario; ?>" class="form-control" placeholder="Salario">
        </div>
        <div class="form-group">
            <select name="Genero" class="form-control">
                <option value="hombre" <?php if ($tipo_persona == 'hombre') echo 'selected'; ?>>Hombre</option>
                <option value="mujer" <?php if ($tipo_persona == 'mujer') echo 'selected'; ?>>Mujer</option>
                <option value="otro" <?php if ($tipo_persona == 'otro') echo 'selected'; ?>>Otro</option>
            </select>
        </div>
        <div class="form-group">
        <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Teléfono">
        </div>
        <div class="form-group">
            <input type="text" name="direccion" value="<?php echo $dirr; ?>" class="form-control" placeholder="Dirección">
        </div>
        <div class="form-group">
            <input type="text" name="CP" value="<?php echo $cp; ?>" class="form-control" placeholder="Código Postal">
        </div>
        <input type="submit" class="btn btn-success btn-block" name="Guardar_empleado" value="Guardar cambios">
    </form>
</div>
</div>
</div>
</div>
<?php include 'Template/footer.php'; ?>
