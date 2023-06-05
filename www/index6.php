<?php
include 'Model/conexion.php';
include 'Template/header1.php';
?>

<div class="container p-4">
    <div class="row justify-content-center"> <!-- Añadido justify-content-center para centrar el formulario -->
        <div class="col-md-6"> 
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
                <h1 class="text-center">Añadir usuario/empleado</h1>
                <h6 class="text-center">Tu nombre, funcionará como usuario y tu apellido paterno como tu contraseña, no lo olvides!</h6>
                <form action="registro.php" method="POST">
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
                        <input type="text" name="Puesto" class="form-control" placeholder="Puesto">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Salario" class="form-control" placeholder="Salario">
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
                    <div class="m-2">
                        <div class="w-100">
                            <input type="submit" class="btn btn-success btn-block" name="Registrar_empleado" value="Registrarme">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- Cierre del div row -->
</div>

<?php include 'Template/footer.php'; ?>
