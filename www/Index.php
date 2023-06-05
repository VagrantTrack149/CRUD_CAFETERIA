<?php include 'Model/conexion.php'; ?>
<?php include 'Template/header.php'; ?>
<div class="text-center">
    <H1>Productos</H1>
</div>
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
            <!-- Insertar productos -->
            <div class="card card-body">
                <form action="insert.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="Producto" class="form-control" placeholder="Descripción del producto">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Cantidad" class="form-control" placeholder="Cantidad del producto">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Precio" class="form-control" placeholder="Precio del producto">
                    </div>
                    <div class="m-2">
                        <div class="w-100">
                        <input type="submit" class="btn btn-success btn-block" name="Guardar" value="Añadir producto">
                        </div>
                    </div>
                    </form>
            </div>
        </div>
        <div class="col-md-8">
            <!-- Tabla de productos -->
            <table class="table table-bordered">
                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </thead>
                <tbody>
                    <?php 
                        $query ="SELECT idProducto, nombreProducto, precio,cantidad FROM Productos";
                        $select_productos = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($select_productos)){
                    ?>
                    <tr>
                        <td><?php  echo $row['nombreProducto'] ?></td>
                        <td><?php  echo $row['cantidad']?></td>
                        <td><?php  echo $row['precio']?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['idProducto']; ?>" >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="delete.php?id=<?php echo $row['idProducto']; ?>" >
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
