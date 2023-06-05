<?php 
    include 'Model/conexion.php';
    include 'Template/header.php';
?>
<div class="text-center"><h1>Proveedores</h1></div>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4"> 
            <!-- MESSAGES --> 
            <?php
                if (isset($_SESSION['Message'])) {
                    $message = $_SESSION['Message'];
                    $messageType = $_SESSION['Message_type'];
                    unset($_SESSION['Message']);
                    unset($_SESSION['Message_type']);
                }
            ?>
            <?php if (isset($message) && isset($messageType)) : ?>
                <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $message; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <!-- Insertar empleados -->
            <div class="card card-body">
                <form action="insert_proveedor.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="Nombre" class="form-control" placeholder="Nombre del empleado">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Paterno" class="form-control" placeholder="Apellido Paterno">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Materno" class="form-control" placeholder="Apellido Materno">
                    </div>
                    <div class="form-group">
                        <!--<input type="text" name="Genero" class="form-control" placeholder="Genero"> -->
                        <select name="Genero" class="form-control">
                        <option value="hombre">Hombre</option>
                        <option value="mujer">Mujer</option>
                        <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="Telefono" class="form-control" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección">
                    </div>
                    <div class="form-group">
                        <input type="text" name="CP" class="form-control" placeholder="Código Postal">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Empresa" class="form-control" placeholder="Empresa">
                    </div>
                    <div class="m-2">
                        <div class="w-100">
                            <input type="submit" class="btn btn-success btn-block" name="Guardar_empleado" value="Agregar proveedor">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Tabla de productos -->
            <table class="table table-bordered">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Genero</th>
                    <th>Numero</th>
                    <th>Direccion</th>
                    <th>Empresa</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    <?php 
                        $query ="SELECT e.idPersona,e.idProveedor, p.nombre, p.apellidoPaterno, p.apellidoMaterno, p.tipoPersona, e.nombreEmpresa,p.telefono,p.direccion
                        FROM Personas p
                        INNER JOIN Proveedores e ON p.idPersona = e.idPersona;";
                        $select_empleados = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($select_empleados)){
                    ?>
                    <tr>
                        <td><?php  echo $row['nombre'] ?></td>
                        <td><?php  echo $row['apellidoPaterno']?></td>
                        <td><?php  echo $row['apellidoMaterno']?></td>
                        <td><?php  echo $row['tipoPersona']?></td>
                        <td><?php  echo $row['telefono']?></td>
                        <td><?php  echo $row['direccion']?></td>
                        <td><?php  echo $row['nombreEmpresa']?></td>
                        <td>
                            <a href="edit_proveedor.php?id=<?php echo $row['idProveedor']; ?>" >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                                <a href="delete_proveedor.php?id=<?php echo $row['idProveedor']; ?>" >
                                <i class="fa-solid fa-eraser"></i>
                            </a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include 'template/footer.php'; ?>
