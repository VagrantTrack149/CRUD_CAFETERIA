<?php include 'Model/conexion.php'; ?>
<?php include 'Template/header.php'; ?>
<div class="text-center">
    <H1>Historial de ventas</H1>
</div>
            <table class="table table-bordered">
                <thead>
                    <th>No.Venta</th>
                    <th>No.Empleado</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                </thead>
                <tbody>
                    <?php 
                        $query ="SELECT idVenta, idEmpleado, fechaVenta, Total FROM Ventas";
                        $select_productos = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($select_productos)){
                    ?>
                    <tr>
                        <td><?php  echo $row['idVenta'] ?></td>
                        <td><?php  echo $row['idEmpleado']?></td>
                        <td><?php  echo $row['fechaVenta']?></td>
                        <td><?php  echo $row['Total']?></td>
                    </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
<?php include 'template/footer.php'; ?>
