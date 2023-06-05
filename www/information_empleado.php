<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $cp=$_GET['cp'];
        $query = "SELECT e.idPersona, e.idEmpleado, p.nombre, p.apellidoPaterno, p.apellidoMaterno, p.tipoPersona, e.puesto, e.salario, p.telefono, p.direccion, p.CP,
                C.NOMBRE AS NOMBRE_COLONIA, CI.NOMBRE AS NOMBRE_CIUDAD, M.NOMBRE AS NOMBRE_MUNICIPIO, ES.NOMBRE AS NOMBRE_ESTADO
                FROM Empleados e
                INNER JOIN Personas p ON e.idPersona = p.idPersona
                INNER JOIN CP cp ON p.CP = cp.CP
                INNER JOIN COLONIAS C ON cp.ID_COLONIA = C.ID_COLONIA
                INNER JOIN CIUDADES CI ON C.ID_CIUDAD = CI.ID_CIUDAD
                INNER JOIN MUNICIPIOS M ON CI.ID_MUNICIPIO = M.ID_MUNICIPIO
                INNER JOIN ESTADOS ES ON M.ID_ESTADO = ES.ID_ESTADO
                WHERE cp.CP = $cp AND e.idEmpleado = $id;";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) >= 1) { 
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $apellido_paterno = $row['apellidoPaterno'];
            $apellido_materno = $row['apellidoMaterno'];
            $puesto = $row['puesto'];
            $salario = $row['salario'];
            $tipo_persona = $row['tipoPersona'];
            $telefono = $row['telefono'];
            $dirr = $row['direccion']; 
            $colonia=$row['NOMBRE_COLONIA'];
            $ciudad=$row['NOMBRE_CIUDAD'];
            $municipios=$row['NOMBRE_MUNICIPIO'];
            $estado=$row['NOMBRE_ESTADO']; 
        }}
    ?>
<?php include 'Template/header.php'; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_empleado.php?id=<?php echo $_GET['id']; ?>" method="POST">
                <div class="form-group">
                    <h6 style="display: inline-block; margin-right: 10px;">Nombre:</h6> <em><?php echo $nombre; ?></em>
                </div>
                <div class="form-group">
                <h6 style="display: inline-block; margin-right: 10px;">Apellido Paterno:</h6><em><?php echo $apellido_paterno; ?></em>
                </div>
                <div class="form-group">
                <h6 style="display: inline-block; margin-right: 10px;">Apellido Materno:</h6><em><?php echo $apellido_materno; ?></em>
                </div>
                <div class="form-group">
                <h6 style="display: inline-block; margin-right: 10px;">Puesto:</h6><em><?php echo $puesto; ?></em>
                </div>
                <div class="form-group">
                <h6 style="display: inline-block; margin-right: 10px;">Salario: $</h6><em><?php echo $salario; ?></em>
                </div>
                <div class="form-group">
                <h6 style="display: inline-block; margin-right: 10px;">Genero:</h6><em><?php echo $tipo_persona?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">Telefono:</h6><em><?php echo $telefono; ?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">Direccion:</h6><em><?php echo $dirr; ?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">CP:</h6><em><?php echo $cp; ?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">Colonia:</h6><em><?php echo $colonia; ?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">Ciudad:</h6><em><?php echo $ciudad; ?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">Municipio:</h6><em><?php echo $municipios; ?></em>
            </div>
            <div class="form-group">
            <h6 style="display: inline-block; margin-right: 10px;">Estado:</h6><em><?php echo $estado; ?></em>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
<?php include 'Template/footer.php'; ?>